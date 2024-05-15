<?php

namespace App\Http\Controllers\API\V1\Invokable;

use App\Http\Controllers\Controller;
use App\Http\Resources\TicketResource;
use App\Models\Ticket;
use App\Models\User;
use App\Services\TicketHistoryService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AssignAgentController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $agent = User::with('department')->findOrFail($request->user_id);
        $ticket = Ticket::findOrFail($request->ticket_id);

        $previousAgent = $ticket->user->name;
        $previousDepartment = $ticket->department->name;

        $ticket->user_id = $agent->id;
        $ticket->department_id = $agent->department->id;

        $ticket->save();

        $comment = 'The assigned user was changed from ' . $previousAgent . ' to ' . $agent->name
            . " by " . Auth::user()->name . '.';

        app(TicketHistoryService::class)
            ->recordHistory($ticket->id, $comment);

        $ticket->load('department', 'user');

        if ($previousDepartment != $ticket->department->name) {

            $comment = 'The department was changed from '
                . $previousDepartment
                . ' to '
                . $ticket->department->name
                . " by " . Auth::user()->name . '.';

            app(TicketHistoryService::class)
                ->recordHistory($ticket->id, $comment);
        }

        return response()->json([
            'success' => true,
            'message' => 'Agent and department reassigned successfully',
            'ticket' => new TicketResource($ticket)
        ]);
    }
}
