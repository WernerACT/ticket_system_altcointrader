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
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'id' => $this->id,
            'name' => $this->name,
            'keywords' => $this->keywords,
            'body' => $this->body,

            'department' => new DepartmentResource($this->whenLoaded('department')),
        ];
    }
}
