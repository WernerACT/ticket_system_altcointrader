<?php

namespace App\Services;

use App\Models\Ticket;

class TicketService
{
    public function createTicket(array $data): Ticket
    {
        $ticket = Ticket::create($data);

        $ticket->reference = $this->generateReference($ticket->id);
        $ticket->save();

        $comment = "Ticket created";

        $ticketHistoryService = app(TicketHistoryService::class);
        $ticketHistoryService->recordHistory($ticket->id, $comment);

        return $ticket;
    }

    protected function generateReference(int $ticketId): string
    {
        return 'ACT' . str_pad($ticketId + 100000, 6, '0', STR_PAD_LEFT);
    }
}
