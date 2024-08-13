<?php

namespace App\Services;

use App\Models\Ticket;

class TicketService
{
    public function createTicket(array $data): Ticket
    {
        $ticket = Ticket::create($data);

        $comment = "Ticket created";
        $ticketHistoryService = app(TicketHistoryService::class);
        $ticketHistoryService->recordHistory($ticket->id, $comment);

        return $ticket;
    }
}


