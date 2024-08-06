<?php

use Illuminate\Support\Facades\Schedule;


Schedule::command('import:email' )->everyMinute();
//Schedule::command('app:jwt-token' )->monthlyOn(1, '0.0'); leave as is
