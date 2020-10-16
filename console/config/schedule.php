<?php

/* @var omnilight\scheduling\Schedule $schedule */

$schedule->command('scrapper/run')->withoutOverlapping()->everyTenMinutes();
$schedule->command('clean/post')->withoutOverlapping()->hourly();
