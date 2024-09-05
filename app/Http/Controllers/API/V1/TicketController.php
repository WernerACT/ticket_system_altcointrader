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

        // Check if search is filled and apply search filter only
        if ($request->filled('search')) {
            $searchType = $request->input('search_type');
            $searchTerm = '%' . $request->input('search') . '%';

            switch ($searchType) {
                case 'email':
                    $query->where('tickets.email', 'like', $searchTerm);
                    break;

                case 'reference':
                    $query->where('tickets.reference', 'like', $searchTerm);
                    break;

                case 'agent':
                    // Join the users table for searching on the agent's name
                    $query->join('users as agent_user', 'tickets.user_id', '=', 'agent_user.id')
                        ->where('agent_user.name', 'like', $searchTerm)
                        ->select('tickets.*'); // Ensure only ticket fields are selected
                    break;

                default:
                    // You may want to handle invalid search types if necessary
                    break;
            }
        } else {
            // Apply filters
            if ($request->filled('start_date')) {
                $query->where('tickets.created_at', '>=', $request->start_date);
            }

            if ($request->filled('end_date')) {
                $endDate = $request->end_date . " 23:59:59";
                $query->where('tickets.created_at', '<=', $endDate);
            }

            if ($request->filled('department_id') && $request->department_id != 0) {
                $query->where('tickets.department_id', $request->department_id);
            }

            if ($request->filled('status_id') && $request->status_id != 0) {
                $query->where('tickets.status_id', $request->status_id);
            }

            if ($request->filled('category_id') && $request->category_id != 0) {
                $query->where('tickets.category_id', $request->category_id);
            }

            if ($request->show_all_tickets == 0) {
                $query->where('tickets.user_id', $user->id);
            }
        }

        // Handle sorting
        $orderBy = $request->input('sort_by', 'created'); // Default order_by to 'created'
        $order = $request->input('order', 'asc'); // Default order to 'asc'

        switch ($orderBy) {
            case 'subject':
                $query->orderBy('tickets.title', $order);
                break;

            case 'email':
                $query->orderBy('tickets.email', $order);
                break;

            case 'department':
                $query->join('departments', 'tickets.department_id', '=', 'departments.id')
                    ->orderBy('departments.name', $order)
                    ->select('tickets.*');
                break;

            case 'status':
                $query->join('statuses', 'tickets.status_id', '=', 'statuses.id')
                    ->orderBy('statuses.name', $order)
                    ->select('tickets.*');
                break;

            case 'agent':
                // Ensure the users table is only joined once
                if (!$query->getQuery()->joins || !collect($query->getQuery()->joins)->pluck('table')->contains('users')) {
                    $query->join('users as sorting_agent_user', 'tickets.user_id', '=', 'sorting_agent_user.id');
                }
                $query->orderBy('sorting_agent_user.name', $order)
                    ->select('tickets.*');
                break;

            case 'modified':
                $query->orderBy('tickets.updated_at', $order);
                break;

            case 'created':
            default:
                $query->orderBy('tickets.created_at', $order);
                break;
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
