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
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'id' => $this->id,
            'email' => $this->email,
            'reference' => $this->reference,
            'description' => $this->description,
            'opened_at' => $this->opened_at,

            'department' => new DepartmentResource($this->whenLoaded('department')),
            'status' => new StatusResource($this->whenLoaded('status')),
        ];
    }
}
