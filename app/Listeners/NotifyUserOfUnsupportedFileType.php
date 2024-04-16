<?php

namespace App\Listeners;

use App\Events\UnsupportedFileTypeDetected;
use App\Notifications\UnsupportedFileTypeNotification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Notification;

class NotifyUserOfUnsupportedFileType
{
    /**
     * Handle the event.
     */
    public function handle(UnsupportedFileTypeDetected $event)
    {
        Notification::route('mail', $event->email)
        ->notify(new UnsupportedFileTypeNotification($event->fileType));
    }
}
