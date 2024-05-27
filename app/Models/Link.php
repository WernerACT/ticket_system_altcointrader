<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Link extends Model
{
    protected $fillable = [
        'canned_response_id',
        'title',
        'url',
    ];

    public function cannedResponse(): BelongsTo
    {
        return $this->belongsTo(CannedResponse::class);
    }
}
