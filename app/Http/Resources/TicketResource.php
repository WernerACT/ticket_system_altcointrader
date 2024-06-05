<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/** @mixin \App\Models\Ticket */
class TicketResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'email' => $this->email,
            'reference' => $this->reference,
            'description' => $this->description,
            'tickets' => TicketResource::collection($this->whenLoaded('tickets')),
            'opened_at' => $this->opened_at ? $this->opened_at->diffForHumans() : null,
            'updated_at' => $this->updated_at->diffForHumans(),
            'created_at' => $this->created_at->diffForHumans(),

            'category' => new CategoryResource($this->whenLoaded('category')),
            'department' => new DepartmentResource($this->whenLoaded('department')),
            'status' => new StatusResource($this->whenLoaded('status')),
            'user' => new UserResource($this->whenLoaded('user')),
            'responses' => ResponseResource::collection($this->whenLoaded('responses')),
        ];
    }
}
