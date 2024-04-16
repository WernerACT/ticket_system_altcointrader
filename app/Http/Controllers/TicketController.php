<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTicketRequest;
use App\Http\Resources\TicketResource;
use App\Models\Ticket;
use Carbon\Carbon;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class TicketController extends Controller
{
    use AuthorizesRequests;

    public function index()
    {
        $this->authorize('viewAny', Ticket::class);

        $tickets = Ticket::with('department', 'user', 'status')->paginate(15);

        return view('tickets.index')->with('tickets', $tickets);
    }

    public function store(StoreTicketRequest $request)
    {
        $this->authorize('create', Ticket::class);

        return new TicketResource(Ticket::create($request->validated()));
    }

    public function show(Ticket $ticket)
    {
        $this->authorize('view', $ticket);

        if ($ticket->status_id === 1) {
            $ticket->status_id = 2; // Assuming 2 is the status ID for "Open"
            $ticket->opened_at = Carbon::now();
            $ticket->save();
        }

        $images = $ticket->images->map(function ($image) {
            $temporaryUrl = route('images.show', ['image' => $image->id]);
            return [
                'url' => $temporaryUrl,
                'name' => $image->name
            ];
        });

        return view('tickets.show', compact('ticket', 'images'));
    }

    public function update(StoreTicketRequest $request, Ticket $ticket)
    {
        $this->authorize('update', $ticket);

        $ticket->update($request->validated());

        return new TicketResource($ticket);
    }

    public function destroy(Ticket $ticket)
    {
        $this->authorize('delete', $ticket);

        $ticket->delete();

        return response()->json();
    }
}
