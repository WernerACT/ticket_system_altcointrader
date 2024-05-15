<?php

namespace App\Http\Controllers\API\V1\Invokable;

use App\Http\Controllers\Controller;
use App\Http\Resources\TicketHistoryResource;
use App\Models\Ticket;
use App\Models\TicketHistory;
use Illuminate\Http\Request;

class TicketHistoryController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request, Ticket $ticket)
    {
        $ticketHistory = TicketHistory::where('ticket_id','=', $ticket->id )->get();

        return response()->json([
            'success' => true,
            'ticketHistory' => TicketHistoryResource::collection($ticketHistory)
        ]);
    }
}
