<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/** @mixin \App\Models\Response */
class ResponseResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        $userLoaded = $this->whenLoaded('user');
        $isUserResponse = $this->user_id !== null;

        return [
            'id' => $this->id,
            'body' => $this->body,
            'created_at' => $this->created_at->format('Y-m-d H:i:s'),
            'from' => $this->resolveFromField(),
            'position' => $isUserResponse ? 'right' : 'left', // Position based on response origin
            'user' => new UserResource($userLoaded),
            'ticket' => new TicketResource($this->whenLoaded('ticket')),
        ];
    }

    private function resolveFromField(): string
    {
        if ($this->user_id !== null && $this->user) {
            return $this->user->name;
        }

        if (!empty($this->email)) {
            return $this->email;
        }

        return $this->ticket->email ?? 'Unknown';
    }
}
