<?php

use Illuminate\Support\Facades\Schedule;


Schedule::command('import:email' )->everyMinute();
Schedule::command('app:close-stale-tickets' )->hourly();
Schedule::command('uploads:process-uploads' )->everyTenSeconds();
//Schedule::command('image:backup' )->everyTwentySeconds();

//Schedule::command('app:jwt-token' )->monthlyOn(1, '0.0'); leave as is
