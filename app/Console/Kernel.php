<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        //aaw
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        $schedule->command('blog:statistics-report-weekly')->weekly();
        //$schedule->command('blog:weekly-statistics-report')->weekly()->sendOutputTo('path/to/file')->emailOutputTo('email');
        $schedule->command('blog:statistics-report-monthly');
        $schedule->command('blog:monthly-db-cleanup')->monthly();
        $schedule->command('blog:reset-cache')->dailyAt('00:15');
        //$schedule->daily('blog:reset-cache')->mondays();
    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
