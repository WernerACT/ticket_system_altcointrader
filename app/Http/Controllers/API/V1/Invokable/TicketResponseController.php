<?php

namespace App\Http\Controllers\API\V1\Invokable;

use App\Http\Controllers\Controller;
use App\Models\CannedResponse;
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
        // Normalize line breaks in the incoming response
        $normalizedResponse = $this->normalizeLineBreaks($request->body);

        // Save the response to the ticket
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

        $email = $ticket->email;
        $response = $request->body;

        // Retrieve the canned response after normalizing line breaks in the body
        $cannedResponse = CannedResponse::where('id', $request->response_id)->first();

        $links = [];
        if ($cannedResponse) {
            $links = $cannedResponse->links;
        }

        // Send the email with the response and optionally include links if required
        Mail::to($email)->queue(new TicketResponseMail($ticket, $response, $links));

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
            'links' => $links,
        ]);
    }

    /**
     * Normalize line breaks in a given string to '\n'.
     */
    protected function normalizeLineBreaks($text)
    {
        return preg_replace('/\r\n|\r|\n/', "\n", $text);
    }
}
