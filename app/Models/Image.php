<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class Image extends Model
{
    protected $fillable = ['path', 'name', 'imageable_type', 'imageable_id', 'image_type_id', 'is_valid'];

    public function imageable(): MorphTo
    {
        return $this->morphTo();
    }

    public function imageType(): BelongsTo
    {
        return $this->belongsTo(ImageType::class);
    }

    protected $casts = [
        'is_valid' => 'boolean',
        'should_delete' => 'boolean',
    ];
}
