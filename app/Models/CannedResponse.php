<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class CannedResponse extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'keywords',
        'body',
    ];

    protected function department(): BelongsTo
    {
        return $this->belongsTo(Department::class);
    }

    protected function casts()
    {
        return [
            'keywords' => 'array',
        ];
    }
}
