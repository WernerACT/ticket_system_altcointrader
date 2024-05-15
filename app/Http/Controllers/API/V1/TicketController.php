<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\Ticket\StoreTicketRequest;
use App\Http\Resources\TicketResource;
use App\Http\Resources\TicketResourceCollection;
use App\Models\Ticket;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TicketController extends Controller
{
    use AuthorizesRequests;

    public function index(Request $request)
    {
        $this->authorize('viewAny', Ticket::class);

        $query = Ticket::with(['user', 'status', 'department']);

        if ($request->filled('start_date')) {
            $query->where('created_at', '>=', $request->start_date);
        }
        if ($request->filled('end_date')) {
            $query->where('created_at', '<=', $request->end_date);
        }
        if ($request->filled('status_id') && $request->status_id != 0) {
            $query->where('status_id', $request->status_id);
        }
        if ($request->filled('department_id') && $request->department_id != 0) {
            $query->where('department_id', $request->department_id);
        }
        if ($request->filled('search')) {
            $query->where('email', 'like', '%' . $request->search . '%');
        }
        if ($request->my_tickets == 1) {
            $query->where('user_id', Auth::id());
        }

        $tickets = $query->paginate(10);

        $ticketIds = $tickets->getCollection()->pluck('id')->all();

        return [
            'success' => true,
            'tickets' => new TicketResourceCollection($tickets),
            'ticket_ids' => $ticketIds,
            ];
    }

    public function store(StoreTicketRequest $request)
    {
        $this->authorize('create', Ticket::class);

        return new TicketResource(Ticket::create($request->validated()));
    }

    public function show(Ticket $ticket)
    {
        $this->authorize('view', $ticket);

        $ticket->load('user', 'department', 'status',);

        return [
            'success' => true,
            'ticket' => new TicketResource($ticket),
        ];
    }

    public function update(StoreTicketRequest $request, Ticket $cannedResponse)
    {
        $this->authorize('update', $cannedResponse);

        $cannedResponse->update($request->validated());

        return [
            "success" => true,
            "ticket" => new TicketResource($cannedResponse)
        ];
    }

    public function destroy(Ticket $cannedResponse)
    {
        $this->authorize('delete', $cannedResponse);

        $cannedResponse->delete();

        return response()->json();
    }
}
