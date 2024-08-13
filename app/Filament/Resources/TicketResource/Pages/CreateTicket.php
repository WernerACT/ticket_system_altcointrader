<?php

namespace App\Filament\Resources\TicketResource\Pages;

use App\Filament\Resources\TicketResource;
use Filament\Resources\Pages\CreateRecord;
use App\Events\TicketCreated;
use Illuminate\Support\Facades\Log;

class CreateTicket extends CreateRecord
{
    protected static string $resource = TicketResource::class;

    protected function afterCreate(): void
    {
        // Ensure the reference is generated and saved
        if (empty($this->record->reference)) {
            $this->record->reference = $this->record->generateReference();
            $this->record->save(); // Save the record with the generated reference
        }

        // Log before dispatching the event
        Log::info('Dispatching TicketCreated event for ticket ID: ' . $this->record->id);

        // Dispatch the TicketCreated event after the reference is generated and saved
        event(new TicketCreated($this->record));
    }
}
