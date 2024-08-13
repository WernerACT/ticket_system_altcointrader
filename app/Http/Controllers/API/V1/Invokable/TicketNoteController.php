<?php

namespace App\Http\Controllers\API\V1\Invokable;

use App\Http\Controllers\Controller;
use App\Http\Requests\Note\StoreNoteRequest;
use App\Models\Note;
use App\Services\TicketHistoryService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TicketNoteController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        Note::create([
            'user_id' => Auth::id(),
            'ticket_id' => $request->ticket_id,
            'body' => $request->body,
        ]);

        $comment = 'Ticket note added by ' . Auth::user()->name;

        app(TicketHistoryService::class)
            ->recordHistory($request->ticket_id, $comment);

        return response()->json([
            'success' => true,
        ]);
    }
}
