<?php

namespace App\Http\Controllers\API\V1\Invokable;

use App\Http\Controllers\Controller;
use App\Http\Resources\TicketResource;
use App\Models\Department;
use App\Models\Ticket;
use App\Services\TicketAssignmentService;
use App\Services\TicketHistoryService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AssignDepartmentController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $ticket = Ticket::findOrFail($request['ticket_id']);

        $oldDepartment = $ticket->department->name;

        $ticket->department_id = $request['department_id'];

        $department = Department::findOrFail($request['department_id']);

        $assignmentService = app(TicketAssignmentService::class);

        $agent = $assignmentService->assignTicketToNextAgent($department);

        $ticket->user_id = $agent->id;

        $ticket->save();

        $ticket->load('department', 'user');

        $comment = "The department was changed from " . $oldDepartment .
            " to "
            . $ticket->department->name
            . " and assigned to "
            . $ticket->user->name
            . " by " . Auth::user()->name . '.';

        app(TicketHistoryService::class)
            ->recordHistory($ticket->id, $comment);

        return response()->json([
            'success' => true,
            'message' => 'Department updated successfully',
            'ticket' => new TicketResource($ticket)
        ]);
    }
}
