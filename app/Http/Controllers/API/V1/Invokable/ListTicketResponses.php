<?php

namespace App\Http\Controllers\API\V1\Invokable;

use App\Http\Controllers\Controller;
use App\Http\Resources\ResponseResource;
use App\Http\Resources\TicketHistoryResource;
use App\Models\Ticket;
use App\Models\TicketHistory;
use Illuminate\Http\Request;

class ListTicketResponses extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request, Ticket $ticket)
    {
        $responses = $ticket->responses()
            ->orderBy('created_at', 'desc')->get();

        return response()->json([
            'success' => true,
            'responses' => ResponseResource::collection($responses)
        ]);
    }
}
