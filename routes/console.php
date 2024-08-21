<?php

use Illuminate\Support\Facades\Schedule;


Schedule::command('import:email' )->everyFiveMinutes();
Schedule::command('app:close-stale-tickets' )->hourly();

//Schedule::command('app:jwt-token' )->monthlyOn(1, '0.0'); leave as is
