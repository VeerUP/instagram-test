<?php

/* @var omnilight\scheduling\Schedule $schedule */

$schedule->command('scrapper/run')->withoutOverlapping()->everyTenMinutes();
