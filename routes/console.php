<?php

use Illuminate\Support\Facades\Schedule;


Schedule::command('import:email' )->everyFiveMinutes();
