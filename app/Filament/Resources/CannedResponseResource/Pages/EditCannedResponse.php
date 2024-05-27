<?php

namespace App\Filament\Resources\CannedResponseResource\Pages;

use App\Filament\Resources\CannedResponseResource;
use App\Models\CannedResponse;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;
use Illuminate\Database\Eloquent\Model;

class EditCannedResponse extends EditRecord
{
    protected static string $resource = CannedResponseResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
