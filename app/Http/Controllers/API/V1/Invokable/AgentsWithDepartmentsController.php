<?php

namespace App\Http\Controllers\API\V1\Invokable;

use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
use App\Models\Ticket;
use App\Models\User;
use App\Services\TicketHistoryService;
use Illuminate\Http\Request;

class AgentsWithDepartmentsController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request, Ticket $ticket)
    {
        $ticket->load('department', 'user');

        $agents = User::with('department')
            ->where('name', '!=', 'Frik') // todo
            ->where('id', '!=', $ticket->user->id)
            ->get();

        $ticketDepartmentName = $ticket->department->name;

        $sortedAgents = $agents->sortBy(function ($agent) use ($ticketDepartmentName) {
            return [$agent->department->name !== $ticketDepartmentName, $agent->department->name];
        });

        return response()->json([
            'success' => true,
            'agents' => UserResource::collection($sortedAgents)
        ]);
    }
}
