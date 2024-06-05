<?php

namespace App\Http\Controllers\API\V1\Invokable;

use App\Http\Controllers\Controller;
use App\Http\Resources\TicketResource;
use App\Models\Ticket;
use App\Services\TicketHistoryService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AssignCategoryController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $ticket = Ticket::findOrFail($request['ticket_id']);

        $oldCategory = $ticket->category->name;

        $ticket->category_id = $request['category_id'];

        $ticket->save();

        $ticket->load('category');

        $comment = "The category was changed from " . $oldCategory .
            " to " . $ticket->category->name
            . " by " . Auth::user()->name . '.';

        app(TicketHistoryService::class)
            ->recordHistory($ticket->id, $comment);

        return response()->json([
            'success' => true,
            'message' => 'Category updated successfully',
            'ticket' => new TicketResource($ticket)
        ]);
    }
}
