<?php

namespace App\Filament\Resources\DocumentResource\Pages;

use App\Filament\Resources\DocumentResource;
use Filament\Resources\Pages\ViewRecord;
use Filament\Support\Enums\MaxWidth;

class ViewDocument extends ViewRecord
{
    protected static string $resource = DocumentResource::class;

    public function getMaxContentWidth(): MaxWidth
    {
        return MaxWidth::Full;
    }
}
