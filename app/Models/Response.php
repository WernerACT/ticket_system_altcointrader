<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Response extends Model
{
    use HasFactory;

    protected $fillable = [
        'body',
    ];

    protected function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    protected function ticket(): BelongsTo
    {
        return $this->belongsTo(Ticket::class);
    }
}
