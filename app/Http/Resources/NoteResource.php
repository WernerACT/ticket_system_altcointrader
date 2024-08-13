<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/** @mixin \App\Models\Response */
class NoteResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        $userLoaded = $this->whenLoaded('user');
        $isUserNote = $this->user_id !== null;

        return [
            'id' => $this->id,
            'body' => $this->body,
            'created_at' => $this->created_at->diffForHumans(),
            'from' => $isUserNote ? $this->user->name : $this->ticket->user->name,
            'position' => $isUserNote ? 'right' : 'left',
            'user' => new UserResource($userLoaded),
            'ticket' => new TicketResource($this->whenLoaded('ticket')),
        ];
    }
}
