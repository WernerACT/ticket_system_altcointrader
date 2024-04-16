<?php

namespace App\Exceptions;

use App\Notifications\ReportErrorNotification;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Support\Facades\Notification;
use Throwable;

class Handler extends ExceptionHandler
{
    /**
     * Report or log an exception.
     *
     * @param Throwable $e
     * @return void
     * @throws Throwable
     */
    public function report(Throwable $e): void
    {
        parent::report($e);

        if ($this->shouldReport($e) && app()->environment('production')) {
            $adminEmail = config('services.admin.email');
            Notification::route('mail', $adminEmail)
                ->notify(new ReportErrorNotification($e));
        }
    }
}
