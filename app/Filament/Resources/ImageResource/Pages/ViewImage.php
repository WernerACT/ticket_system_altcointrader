<?php

namespace App\Filament\Resources\ImageResource\Pages;

use App\Filament\Resources\ImageResource;
use Filament\Resources\Pages\ViewRecord;
use Filament\Support\Enums\MaxWidth;

class ViewImage extends ViewRecord
{
    protected static string $resource = ImageResource::class;

    public function getMaxContentWidth(): MaxWidth
    {
        return MaxWidth::Full;
    }

}
