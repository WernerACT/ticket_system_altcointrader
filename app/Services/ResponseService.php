<?php

namespace App\Services;

use App\Models\Response;
use App\Models\Ticket;

class ResponseService
{
    public function createResponse(Ticket $ticket, array $data): Response
    {
        $body = $this->extractOriginalMessage($data['description'] ?? '');

        $response = new Response([
            'ticket_id' => $ticket->id,
            'body' => $body,
            'email' => $data['email'],
        ]);

        $comment = "The client sent a response from " . $data['email'];

        app(TicketHistoryService::class)
            ->recordHistory($ticket->id, $comment);


        $ticket->status_id = 9;
        $ticket->save();

        $response->save();

        $comment = "The ticket status was changed to Client Response Received.";

        app(TicketHistoryService::class)
            ->recordHistory($ticket->id, $comment);

        return $response;
    }

    private function extractOriginalMessage($body)
    {
        // Regex pattern to match the quoted text starting with "On [date] at [time], ACT Support wrote:"
        $pattern = '/On \d{4}\/\d{2}\/\d{2} \d{2}:\d{2}, ACT Support wrote:/s';

        // Split the body at the first occurrence of the pattern
        $parts = preg_split($pattern, $body, 2);
        $originalMessage = $parts[0];

        // Optionally, remove any excessive newlines
        $originalMessage = preg_replace('/\n{3,}/', "\n\n", $originalMessage);

        return trim($originalMessage);
    }
}
