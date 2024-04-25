<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Controllers\Controller;
use App\Http\Resources\DepartmentResource;
use App\Http\Resources\StatusResource;
use App\Http\Resources\TicketResource;
use App\Models\Department;
use App\Models\Status;
use App\Models\Ticket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TicketDetailController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request, Ticket $ticket)
    {
        $user = Auth::user();

        if ($user && $user->role_id === 3 && $user->department_id === $ticket->department_id) {
            $ticket->update([
                'user_id' => $user->id
            ]);
        }

        if ($ticket->status_id === 1) {
            $ticket->update([
                'status_id' => 2,
                'opened_at' => now()
            ]);
        }

        $ticket->load(['user', 'department', 'images', 'documents', 'responses.user']);

        $departments = Department::all()->sortByDesc(function ($dept) use ($ticket) {
            return $dept->id === $ticket->department->id;
        });

        $statuses = Status::whereNotIn('name', ['New', 'Read'])->get()->sortByDesc(function ($status) use ($ticket) {
            return $status->id === $ticket->status->id;
        });

        return response()->json([
            'success' => true,
            'ticket' => new TicketResource($ticket),
            'statuses' => StatusResource::collection($statuses),
            'departments' => DepartmentResource::collection($departments),
        ]);
    }
}
