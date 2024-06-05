<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/** @mixin \App\Models\CannedResponse */
class CannedResponseResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'status_id' => $this->suggested_status_id,
            'body' => $this->body,

            'department' => new DepartmentResource($this->whenLoaded('department')),
        ];
    }
}
