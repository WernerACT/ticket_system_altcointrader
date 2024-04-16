<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/** @mixin \App\Models\Response */
class ResponseResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'id' => $this->id,
            'body' => $this->body,

            'from' => new UserResource($this->whenLoaded('from')),
            'ticket' => new TicketResource($this->whenLoaded('ticket')),
        ];
    }
}
