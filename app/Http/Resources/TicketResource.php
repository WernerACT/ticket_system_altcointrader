<?php

namespace App\Http\Resources;

use App\Models\Ticket;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Str;

/** @mixin \App\Models\Ticket */
class TicketResource extends JsonResource
{

    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'email' => $this->email,
            'reference' => $this->reference,
            'title' => $this->title,
            'description' => $this->description,
//            'tickets' => TicketResource::collection($this->whenLoaded('tickets')),
            'opened_at' => $this->opened_at ? $this->opened_at->format('Y-m-d H:i:s') : null,
            'updated_at' => $this->updated_at ? $this->updated_at->format('Y-m-d H:i:s') : null,
            'created_at' => $this->created_at ? $this->created_at->format('Y-m-d H:i:s') : null,
            'category' => $this->category ? $this->category->name : null,
            'department' => new DepartmentResource($this->whenLoaded('department')),
            'status' => new StatusResource($this->whenLoaded('status')),
            'user' => new UserResource($this->whenLoaded('user')),
            'notes_count' => $this->notes()->count(),
            'uploads_count' => $this->images()->count() + $this->documents()->count(),
            'related_ticket_count' => Ticket::whereEmail($this->email)->count(),
            'responses' => ResponseResource::collection($this->whenLoaded('responses')),
        ];
    }
}
