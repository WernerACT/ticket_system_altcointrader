<?php

namespace App\Http\Controllers\API\V1\Invokable;

use App\Http\Controllers\Controller;
use App\Http\Resources\StatusResource;
use App\Models\Status;
use App\Models\Ticket;
use Illuminate\Http\Request;

class TicketStatusController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request, Ticket $ticket)
    {
        $currentStatusID = $ticket->status_id;

        $statuses = Status::where('id', '!=', $currentStatusID)
            ->where('name', '!=', 'New')
            ->where('name', '!=', 'Read')->get();

        return response()->json([
            'success' => true,
            'statuses' => StatusResource::collection($statuses)
        ]);
    }
}
