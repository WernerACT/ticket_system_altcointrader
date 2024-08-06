<?php

namespace App\Http\Controllers\API\V1\Invokable;

use App\Http\Controllers\Controller;
use App\Models\Response;
use App\Models\Ticket;
use App\Mail\TicketResponseMail;
use App\Services\TicketHistoryService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class TicketResponseController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        Response::create([
            'user_id' => Auth::id(),
            'ticket_id' => $request->ticket_id,
            'body' => $request->body,
        ]);

        $comment = 'Ticket response sent by ' . Auth::user()->name;

        app(TicketHistoryService::class)
            ->recordHistory($request->ticket_id, $comment);

        $ticket = Ticket::findOrFail($request->ticket_id);
        $oldStatus = $ticket->status;

        $email = $ticket->email; // where I would like to send the email to.
        $body = $request->body; // the body of the email

        // Send the email
        Mail::to($email)->queue(new TicketResponseMail($ticket, $body));

        if ($oldStatus->id != $request->status_id) {
            $ticket->update([
                'status_id' => $request->status_id,
            ]);

            $ticket->load('status');

            $comment = "Ticket status updated from " . $oldStatus->name . " to " . $ticket->status->name . " by " . Auth::user()->name;

            app(TicketHistoryService::class)
                ->recordHistory($request->ticket_id, $comment);
        }

        return response()->json([
            'success' => true,
        ]);
    }
}
