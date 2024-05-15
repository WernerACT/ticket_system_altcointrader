<?php

namespace App\Services;

use App\Models\TicketHistory;

class TicketHistoryService
{
    public function recordHistory($ticketId, $comment)
    {
        $ticketHistory = new TicketHistory;

        $ticketHistory->ticket_id = $ticketId;
        $ticketHistory->comment = $comment;

        $ticketHistory->save();

        return $ticketHistory;
    }
}
