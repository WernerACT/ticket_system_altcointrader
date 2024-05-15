<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ImageResource extends JsonResource
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
            'created_at' => $this->created_at->diffForHumans(),

            'imageType' => new ImageTypeResource($this->whenLoaded('imageType')),
        ];
    }
}
