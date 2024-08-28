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

        $user = Auth::user();

        $query = Ticket::with(['user', 'status', 'department', 'category']);

        // Filter by start date
        if ($request->filled('start_date')) {
            $query->where('created_at', '>=', $request->start_date);
        }

        // Filter by end date
        if ($request->filled('end_date')) {
            $endDate = $request->end_date . " 23:59:59";
            $query->where('created_at', '<=', $endDate);
        }

        // Filter by department_id if not 0
        if ($request->filled('department_id') && $request->department_id != 0) {
            $query->where('department_id', $request->department_id);
        }

        // Filter by status_id if not 0
        if ($request->filled('status_id') && $request->status_id != 0) {
            $query->where('status_id', $request->status_id);
        }

        // Filter by category_id if not 0
        if ($request->filled('category_id') && $request->category_id != 0) {
            $query->where('category_id', $request->category_id);
        }

        // Filter by email (search)
        if ($request->filled('search')) {
            $query->where($request->search_type, 'like', '%' . $request->search . '%');
        }

        // Filter by user_id if show_all_tickets is 0
        if ($request->show_all_tickets == 0) {
            $query->where('user_id', $user->id);
        }

        // Paginate the results
        $tickets = $query->paginate(25);

        // Get the ticket IDs for additional use
        $ticketIds = $tickets->getCollection()->pluck('id')->all();

        return [
            'success' => true,
            'tickets' => new TicketResourceCollection($tickets),
            'ticket_ids' => $ticketIds,
            'pagination' => [
                'total' => $tickets->total(),
                'per_page' => $tickets->perPage(),
                'current_page' => $tickets->currentPage(),
                'last_page' => $tickets->lastPage(),
                'next_page_url' => $tickets->nextPageUrl(),
                'prev_page_url' => $tickets->previousPageUrl(),
            ],
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
