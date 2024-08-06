<?php

namespace App\Jobs;

use App\Models\Department;
use App\Models\Ticket;
use App\Notifications\TicketCreatedNotification;
use App\Services\AttachmentService;
use App\Services\MailboxService;
use App\Services\ResponseService;
use App\Services\TicketAssignmentService;
use App\Services\TicketService;
use App\Services\TicketValidationService;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Database\QueryException;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Notification;
use Illuminate\Validation\ValidationException;
use Throwable;

class ProcessEmailIntoTicket implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $email;

    public function __construct($email)
    {
        $this->email = $email;
    }

    public function handle(): void
    {
        $ticketService = app(TicketService::class);
        $assignmentService = app(TicketAssignmentService::class);
        $validationService = app(TicketValidationService::class);
        $attachmentService = app(AttachmentService::class);
        $responseService = app(ResponseService::class);
        $mailboxService = app(MailboxService::class);
        $department = Department::findOrFail(1);

        try {
            DB::transaction(function () use ($ticketService, $assignmentService, $validationService, $attachmentService, $responseService, $mailboxService, $department, &$ticket) {
                $agent = $assignmentService->assignTicketToNextAgent($department);
                if (!$agent) {
                    throw new ModelNotFoundException('No available agent to assign ticket.');
                }

                $data = [
                    'title' => $this->email['subject'] ?? 'No Subject Provided',
                    'email' => $this->email['from'],
                    'description' => strip_tags($this->email['subject']
                        . ' - '
                        . '<br><br>'
                        . $this->email['body']
                        . '<br><br>'
                        . $this->email['html'],
                        '<br>'),
                    'department_id' => $department->id,
                    'status_id' => 1,
                    'user_id' => $agent->id,
                ];

                $validatedData = $validationService->validate($data);

                if (preg_match('/ACT\d{5,}/i', $data['title'], $matches)) {
                    $ticketReference = $matches[0];
                    $existingTicket = Ticket::where('reference', $ticketReference)->first();

                    if ($existingTicket) {
                        $responseService->createResponse($existingTicket, $validatedData);
                        if (!empty($this->email['attachments'])) {
                            $attachmentService->handleAttachments($existingTicket, $this->email['attachments']);
                        }

                        $mailboxService->markAsRead($this->email['messageId']);
                        return;
                    }
                }

                // Create a new ticket if no existing ticket is found
                $ticket = $ticketService->createTicket($validatedData);
                if (!empty($this->email['attachments'])) {
                    $attachmentService->handleAttachments($ticket, $this->email['attachments']);
                }

                $mailboxService->markAsRead($this->email['messageId']);
            });

            if ($ticket) {
                Notification::send($ticket, new TicketCreatedNotification($ticket->id));
            }
        } catch (ModelNotFoundException $e) {
            Log::error("Assignment error: " . $e->getMessage());
        } catch (ValidationException $e) {
            Log::error("Validation error: " . $e->getMessage());
        } catch (QueryException $e) {
            Log::error("Database error: " . $e->getMessage());
        } catch (Throwable $e) {
            Log::error("Unexpected error in processing email into ticket: " . $e->getMessage());
        }
    }
}
