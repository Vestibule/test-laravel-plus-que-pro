<?php

use Illuminate\Support\Facades\Schedule;

Schedule::command('movies:fetch-trending')->daily();
