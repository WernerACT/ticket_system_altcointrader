<?php

namespace App\Services;

use App\Models\Response;
use App\Models\Ticket;

class ResponseService
{
    public function createResponse(Ticket $ticket, array $data): Response
    {
        $body = $data['description'] ?? '';

        $response = new Response([
            'ticket_id' => $ticket->id,
            'body' => $body,
        ]);

        $response->save();

        $comment = "The client sent a response";

        app(TicketHistoryService::class)
            ->recordHistory($ticket->id, $comment);

        return $response;

    }
}
