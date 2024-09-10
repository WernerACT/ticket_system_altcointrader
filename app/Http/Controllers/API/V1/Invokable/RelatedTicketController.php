<?php

namespace App\Http\Controllers\API\V1\Invokable;

use App\Http\Controllers\Controller;
use App\Http\Resources\DepartmentResource;
use App\Http\Resources\TicketResource;
use App\Models\Department;
use App\Models\Ticket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RelatedTicketController extends Controller
{
    public function __invoke(Ticket $ticket)
    {
        $email = $ticket->email;

        $tickets = (new \App\Models\Ticket)->whereEmail($email)
            ->with('department')
            ->with('status')
            ->with('user')
            ->paginate(25);

        return response()->json([
            'success' => true,
            'tickets' => TicketResource::collection($tickets),
            'pagination' => [
                'total' => $tickets->total(),
                'per_page' => $tickets->perPage(),
                'current_page' => $tickets->currentPage(),
                'last_page' => $tickets->lastPage(),
                'next_page_url' => $tickets->nextPageUrl(),
                'prev_page_url' => $tickets->previousPageUrl(),
            ],
        ]);
    }
}
