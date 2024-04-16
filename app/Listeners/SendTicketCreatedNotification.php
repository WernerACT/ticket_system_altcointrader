<?php

namespace App\Listeners;

use App\Events\TicketCreated;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Notification;

class SendTicketCreatedNotification
{

    /**
     * Handle the event.
     */
    public function handle(TicketCreated $event): void
    {
        try {
            Notification::send($event->ticket, new TicketCreatedNotification($event->ticket->id));
        } catch (\Exception $e) {
            Log::error("Notification sending error: " . $e->getMessage());
        }
    }
}
