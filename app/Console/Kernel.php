<?php

namespace App\Console;

use App\Console\Commands\UnusedImages;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        //$schedule->command('inspire')->hourly();
        $schedule->command('unusedimages:cron')->everyMinute();
    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        //protected $commands = [
        //     Commands\UnusedImages::class
        //   ];
        $this->load(UnusedImages::class);

        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
