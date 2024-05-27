<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Category extends Model
{
    protected $fillable = [
        'name',
        'ticket_id',
    ];

    public function tickets(): HasMany
    {
        return $this->hasMany(Ticket::class);
    }

    public function cannedResponses(): BelongsToMany
    {
        return $this->belongsToMany(CannedResponse::class, 'canned_response_category');
    }

    public function department(): BelongsTo
    {
        return $this->belongsTo(Department::class);
    }
}
