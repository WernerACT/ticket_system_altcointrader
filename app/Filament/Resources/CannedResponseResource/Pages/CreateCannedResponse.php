<?php

namespace App\Filament\Resources\CannedResponseResource\Pages;

use App\Filament\Resources\CannedResponseResource;
use App\Models\CannedResponse;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Log;

class CreateCannedResponse extends CreateRecord
{
    protected static string $resource = CannedResponseResource::class;
}
