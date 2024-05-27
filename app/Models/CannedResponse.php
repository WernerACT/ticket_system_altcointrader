<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class CannedResponse extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'department_id',
        'keywords',
        'body',
        'suggested_status_id',
    ];

    public function department(): BelongsTo
    {
        return $this->belongsTo(Department::class);
    }

    public function categories(): BelongsToMany
    {
        return $this->belongsToMany(Category::class, 'canned_response_category');
    }

    public function suggestedStatus(): BelongsTo
    {
        return $this->belongsTo(Status::class, 'suggested_status_id');
    }

    public function links(): HasMany
    {
        return $this->hasMany(Link::class);
    }

    protected function casts()
    {
        return [
            'keywords' => 'array',
        ];
    }
}
