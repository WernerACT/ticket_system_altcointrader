<?php

namespace App\Http\Controllers\API\V1\Invokable;

use App\Http\Controllers\Controller;
use App\Http\Resources\TicketResource;
use App\Models\Ticket;
use App\Services\TicketHistoryService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AssignStatusController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $ticket = Ticket::findOrFail($request['ticket_id']);

        $oldStatus = $ticket->status->name;

        $ticket->status_id = $request['status_id'];

        $ticket->save();

        $ticket->load('status');

        $comment = "The status was changed from " . $oldStatus .
            " to " . $ticket->status->name
            . " by " . Auth::user()->name . '.';

        app(TicketHistoryService::class)
            ->recordHistory($ticket->id, $comment);

        return response()->json([
            'success' => true,
            'message' => 'Status updated successfully',
            'ticket' => new TicketResource($ticket)
        ]);
    }
}
