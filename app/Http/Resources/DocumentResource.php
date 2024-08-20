<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class DocumentResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'is_valid' => $this->is_valid,
            'should_delete' => $this->should_delete,

            'documentType' => new DocumentTypeResource($this->whenLoaded('documentType')),
        ];
    }
}
