<?php

namespace App\Http\Controllers\API\V1\Invokable;

use App\Http\Controllers\Controller;
use App\Models\Ticket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NavigateTicketsController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {

        $user = Auth::user();

        $query = Ticket::query();

        // Filter by date range
        if ($request->filled('start_date')) {
            $query->where('tickets.created_at', '>=', $request->start_date);
        }

        if ($request->filled('end_date')) {
            $endDate = $request->end_date . " 23:59:59";
            $query->where('tickets.created_at', '<=', $endDate);
        }

        // Filter by department_id if not 0
        if ($request->filled('department_id') && $request->department_id != 0) {
            $query->where('tickets.department_id', $request->department_id);
        }

        // Filter by status_id if not 0
        if ($request->filled('status_id') && $request->status_id != 0) {
            $query->where('tickets.status_id', $request->status_id);
        }

        // Filter by category_id if not 0
        if ($request->filled('category_id') && $request->category_id != 0) {
            $query->where('tickets.category_id', $request->category_id);
        }

        // Filter by user_id if show_all_tickets is 0
        if ($request->all_tickets == 0) {
            $query->where('tickets.user_id', $user->id);
        }

        // Handle sorting
        $orderBy = $request->input('sort_by', 'created');
        $order = $request->input('order', 'asc');

        switch ($orderBy) {
            case 'subject':
                $query->orderBy('tickets.title', $order);
                break;
            case 'email':
                $query->orderBy('tickets.email', $order);
                break;
            case 'department':
                $query->join('departments', 'tickets.department_id', '=', 'departments.id')
                    ->orderBy('departments.name', $order);
                break;
            case 'status':
                $query->join('statuses', 'tickets.status_id', '=', 'statuses.id')
                    ->orderBy('statuses.name', $order);
                break;
            case 'modified':
                $query->orderBy('tickets.updated_at', $order);
                break;
            case 'created':
            default:
                $query->orderBy('tickets.created_at', $order);
                break;
        }

        // Get the ticket IDs
        $ticketIds = $query->pluck('tickets.id')->toArray();

        dump($ticketIds);

        // Find the current position of the ticket_id in the array
        $currentTicketIndex = array_search($request->ticket_id, $ticketIds);

        // Determine the next or previous ticket ID based on direction
        $nextTicketID = 0; // Default to 0 if not found

        if ($currentTicketIndex !== false) {
            if ($request->direction === 'next' && isset($ticketIds[$currentTicketIndex + 1])) {
                $nextTicketID = $ticketIds[$currentTicketIndex + 1];
            } elseif ($request->direction === 'prev' && isset($ticketIds[$currentTicketIndex - 1])) {
                $nextTicketID = $ticketIds[$currentTicketIndex - 1];
            }
        }

        return response()->json([
            'success' => true,
            'ids' => $ticketIds,
            'ticket_id' => $nextTicketID
        ]);
    }
}
