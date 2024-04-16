<?php

namespace App\Listeners;

use App\Events\GeneralErrorOccurred;
use App\Notifications\ReportErrorNotification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Notification;

class NotifyAdminOfGeneralError
{
    /**
     * Handle the event.
     */
    public function handle(GeneralErrorOccurred $event): void
    {
        $adminEmail = config('services.admin.email');
        Notification::route('mail', $adminEmail)
            ->notify(new ReportErrorNotification($event->exception));
    }
}
