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
use DOMDocument;

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

                // Clean up the HTML body by removing unnecessary tags and extracting text content
                $cleanHtmlBody = $this->cleanHtmlBody($this->processCidAttachments($attachmentService));

                $data = [
                    'title' => $this->email['subject'] ?? 'No Subject Provided',
                    'email' => $this->email['from'],
                    'description' => $cleanHtmlBody ?? 'The message received does not contain any content in the body of the message',
                    'department_id' => $department->id,
                    'status_id' => 1,
                    'user_id' => $agent->id,
                ];

                if (empty($data['description'])) {
                    $data['description'] = 'The message received does not contain any valid content in the body of the message';
                }

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

    protected function processCidAttachments(AttachmentService $attachmentService)
    {
        $htmlBody = $this->email['html'] ?? '';

        // If HTML body is empty, fallback to plain text body
        if (empty($htmlBody)) {
            $htmlBody = $this->email['body'] ?? '';
        }

        // Check for CID references in the HTML body
        if (!empty($this->email['attachments'])) {
            foreach ($this->email['attachments'] as $attachment) {
                if (isset($attachment['name'], $attachment['content']) && !empty($attachment['contentId'])) {
                    // Process the CID attachment as a regular attachment
                    $fileType = $attachmentService->getFileType($attachment['type'], $attachment['name']);
                    if ($fileType === 'image') {
                        // Remove the CID reference and handle as attachment
                        $cid = trim($attachment['contentId'], '<>');
                        $htmlBody = str_replace("cid:$cid", '', $htmlBody);
                        $attachmentService->handleAttachments($this->email, [$attachment]);
                    }
                }
            }
        }

        return $htmlBody;
    }

    protected function removeUnwantedTags(DOMDocument $dom, array $tags): void
    {
        foreach ($tags as $tag) {
            $elements = $dom->getElementsByTagName($tag);
            while ($elements->length > 0) {
                $elements->item(0)->parentNode->removeChild($elements->item(0));
            }
        }
    }

    protected function cleanHtmlBody(string $html): string
    {
        if (empty($html)) {
            return 'The message received does not contain any content in the body of the message'; // Default message
        }

        // Convert the HTML to UTF-8 if it's not already
        $html = mb_convert_encoding($html, 'UTF-8', 'auto');

        $dom = new DOMDocument();

        // Suppress errors due to malformed HTML and load the HTML content
        @$dom->loadHTML($html, LIBXML_NOERROR | LIBXML_NOWARNING);

        // Remove unwanted tags: style, script, img, etc.
        $this->removeUnwantedTags($dom, ['style', 'script', 'img', 'head', 'meta', 'link']);

        // Extract the text content from the cleaned DOM
        $textContent = $this->getTextFromDom($dom);

        // Remove the "Â" character and unwanted tags
        $textContent = str_replace('Â', '', strip_tags($textContent));

        // Limit consecutive #ACTLINEBREAK# placeholders to a maximum of three
        $textContent = $this->limitConsecutiveLineBreaks($textContent);

        // Handle special case for Gmail responses
        $textContent = $this->removePreviousGmailResponse($textContent);

        return trim($textContent) ?: 'The message received does not contain any content in the body of the message';
    }

    protected function limitConsecutiveLineBreaks(string $text): string
    {
        // Replace three or more #ACTLINEBREAK# placeholders (with possible spaces or line breaks between them) with exactly two
        return preg_replace('/(#ACTLINEBREAK#\s*){3,}/', '#ACTLINEBREAK##ACTLINEBREAK##ACTLINEBREAK#', $text);
    }

    protected function removePreviousGmailResponse(string $text): string
    {
        // Regular expression to match "On Mon,", "On Tue,", ..., "On Sun," and everything that follows
        $pattern = '/On (Mon|Tue|Wed|Thu|Fri|Sat|Sun),.*$/s';

        // Replace the matched pattern with an empty string
        return preg_replace($pattern, '', $text);
    }

    protected function getTextFromDom(DOMDocument $dom): string
    {
        $body = $dom->getElementsByTagName('body')->item(0);
        $textContent = $body ? $dom->saveHTML($body) : '';

        // Convert to UTF-8 to handle any non-UTF-8 text
        $textContent = mb_convert_encoding($textContent, 'UTF-8', 'auto');

        // Normalize line breaks to handle format=flowed
        $textContent = $this->normalizeLineBreaks($textContent);

        // Replace non-breaking spaces with a regular space
        $textContent = str_replace("\xC2\xA0", ' ', $textContent);  // Handle non-breaking spaces
        $textContent = str_replace('&nbsp;', ' ', $textContent);    // Handle encoded non-breaking spaces

        // Replace <br> tags with #ACTLINEBREAK#
        $textContent = preg_replace('/<br\s*\/?>/i', ' #ACTLINEBREAK##ACTLINEBREAK# ', $textContent);

        // Replace line breaks and new lines with #ACTLINEBREAK#
        $textContent = str_replace(["\r\n", "\r", "\n"], ' #ACTLINEBREAK##ACTLINEBREAK# ', $textContent);

        // Clean up the text using the cleanText function
        $textContent = $this->cleanText($textContent);

        // Remove any extra spaces, non-breaking spaces, or multiple #ACTLINEBREAK# placeholders
        $textContent = preg_replace('/\s+/', ' ', $textContent);  // Collapse multiple spaces into one
        $textContent = preg_replace('/\s*#ACTLINEBREAK#\s*/', '#ACTLINEBREAK##ACTLINEBREAK#', $textContent); // Ensure no surrounding spaces around #ACTLINEBREAK#

        // Collapse sequences of #ACTLINEBREAK# into a maximum of two consecutive ones
        $textContent = preg_replace('/(#ACTLINEBREAK#){3,}/', '#ACTLINEBREAK##ACTLINEBREAK#', $textContent);

        return trim($textContent);
    }

    public static function cleanText($input, $max = 20000)
    {
        $result = trim($input);

        if (strlen($result) > $max) {
            $result = "";
        }

        // Replace UTF-8 characters
        $result = str_replace(
            array("\xe2\x80\x98", "\xe2\x80\x99", "\xe2\x80\x9c", "\xe2\x80\x9d", "\xe2\x80\x93", "\xe2\x80\x94", "\xe2\x80\xa6"),
            array("'", "'", '"', '"', '-', '--', '...'),
            $result
        );

        // Replace Windows-1252 equivalents
        $result = str_replace(
            array(chr(145), chr(146), chr(147), chr(148), chr(150), chr(151), chr(133), chr(160), chr(187)),
            array("'", "'", '"', '"', '-', '--', '...', ' ', ' '),
            $result
        );

        // Reject overly long 2-byte sequences and characters above U+10000
        $result = preg_replace(
            '/[\x00-\x08\x10\x0B\x0C\x0E-\x19\x7F]'.
            '|[\x00-\x7F][\x80-\xBF]+'.
            '|([\xC0\xC1]|[\xF0-\xFF])[\x80-\xBF]*'.
            '|[\xC2-\xDF]((?![\x80-\xBF])|[\x80-\xBF]{2,})'.
            '|[\xE0-\xEF](([\x80-\xBF](?![\x80-\xBF]))|(?![\x80-\xBF]{2})|[\x80-\xBF]{3,})/S',
            '',
            $result
        );

        // Reject overly long 3-byte sequences and UTF-16 surrogates
        $result = preg_replace(
            '/\xE0[\x80-\x9F][\x80-\xBF]'.
            '|\xED[\xA0-\xBF][\x80-\xBF]/S',
            '',
            $result
        );

        // Remove whitespace
        $result = trim(preg_replace('/\s+/', ' ', $result));

        return $result;
    }

    protected function normalizeLineBreaks(string $text): string
    {
        // Remove soft line breaks (replace "\n" followed by a space or empty with a space)
        $text = preg_replace('/\n\s*/', ' ', $text);

        // Remove other single line breaks that are not followed by a newline (paragraph break)
        $text = preg_replace('/(?<!\n)\n(?!\n)/', ' ', $text);

        return $text;
    }

}
