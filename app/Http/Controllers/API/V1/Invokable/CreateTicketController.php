<?php

namespace App\Http\Controllers\API\V1\Invokable;

use App\Http\Controllers\Controller;
use App\Http\Requests\Ticket\StoreTicketRequest;
use App\Http\Resources\NoteResource;
use App\Http\Resources\TicketResource;
use App\Models\Department;
use App\Models\Response;
use App\Models\Ticket;
use App\Mail\TicketResponseMail;
use App\Notifications\TicketCreatedNotification;
use App\Services\TicketAssignmentService;
use App\Services\TicketHistoryService;
use App\Services\TicketService;
use App\Services\TicketValidationService;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Notification;

class CreateTicketController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $assignmentService = app(TicketAssignmentService::class);
        $validationService = app(TicketValidationService::class);
        $ticketService = app(TicketService::class);

        $department = Department::findOrFail(1);

        $agent = $assignmentService->assignTicketToNextAgent($department);
        if (!$agent) {
            throw new ModelNotFoundException('No available agent to assign ticket.');
        }

        $data = [
            'title' => 'ACT Web Ticket',
            'email' => $request->email,
            'description' => $request->message,
            'department_id' => 1,
            'status_id' => 1,
            'user_id' => $agent->id,
        ];

        $validatedData = $validationService->validate($data);

        $ticket = $ticketService->createTicket($validatedData);
        if ($ticket) {
            Notification::send($ticket, new TicketCreatedNotification($ticket->id));
        }

        return response()->json([
            'success' => true,
            'data' => $ticket->reference,
        ]);
    }
}
