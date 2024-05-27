<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/** @mixin \App\Models\Link */
class LinkResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'id' => $this->id,
            'title' => $this->title,
            'url' => $this->url,

            'canned_response_id' => $this->canned_response_id,

            'cannedResponse' => new CannedResponseResource($this->whenLoaded('cannedResponse')),
        ];
    }
}
