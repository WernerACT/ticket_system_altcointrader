<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\Response\StoreResponseRequest;
use App\Http\Resources\ResponseResource;
use App\Http\Resources\TicketResource;
use App\Models\Response;
use App\Models\Ticket;
use App\Services\TicketHistoryService;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\Auth;

class ResponseController extends Controller
{
    use AuthorizesRequests;

    public function index()
    {
        $this->authorize('viewAny', Response::class);

        return ResponseResource::collection(Response::all());
    }

    public function store(StoreResponseRequest $request)
    {
        $ticket = Ticket::findOrFail($request->ticket_id);

        $ticket->status_id = $request->status_id;
        $ticket->save();

        $this->authorize('create', Response::class);

        $response = new Response([
            'ticket_id' => $request->ticket_id,
            'user_id' => Auth::id(),
            'body' => $request->body,
        ]);
        $response->save();

        $comment = "A new response was sent by " . Auth::user()->name;

        app(TicketHistoryService::class)
            ->recordHistory($ticket->id, $comment);

        $ticket ->load('status', 'department', 'user', 'responses', 'images', 'documents');

        return [
            'success' => true,
            'response' => new ResponseResource($response),
            'ticket' => new TicketResource($ticket)
            ];
    }

    public function show(Response $cannedResponse)
    {
        $this->authorize('view', $cannedResponse);

        return new ResponseResource($cannedResponse);
    }

    public function update(StoreResponseRequest $request, Response $cannedResponse)
    {
        $this->authorize('update', $cannedResponse);

        $cannedResponse->update($request->validated());

        return new ResponseResource($cannedResponse);
    }

    public function destroy(Response $cannedResponse)
    {
        $this->authorize('delete', $cannedResponse);

        $cannedResponse->delete();

        return response()->json();
    }
}
