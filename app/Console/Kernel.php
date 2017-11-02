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
        \App\Console\Commands\ScrapeTokopedia::class,
//        \App\Console\Commands\ScrapeBukalapak::class,
//        \App\Console\Commands\ScrapeBlibli::class,
//        \App\Console\Commands\ScrapeLazada::class,
//        \App\Console\Commands\ScrapeMataharimall::class,
//        \App\Console\Commands\CountItem::class,
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        // $schedule->command('inspire')
        //          ->hourly();
        $filePath='/home/nine9toko/';
        $run1 = '0,5,10,15,20,25,30,35,40,45,50,55 * * * *';
        $run2 = '1,6,11,16,21,26,31,36,41,46,51,56 * * * *';
        $run3 = '2,7,12,17,22,27,32,37,42,47,52,57 * * * *';
        $run4 = '3,8,13,18,23,28,33,38,43,48,53,58 * * * *';
        $run5 = '4,9,14,19,24,29,34,39,44,49,54,59 * * * *';

        $schedule->command('sc:tp')->cron($run1)->withoutOverlapping()->appendOutputTo($filePath.'tp.txt');
        $schedule->command('sc:bl')->cron($run2)->withoutOverlapping()->appendOutputTo($filePath.'bl.txt');
        $schedule->command('sc:bb')->cron($run3)->withoutOverlapping()->appendOutputTo($filePath.'bb.txt');
        $schedule->command('sc:lz')->cron($run4)->withoutOverlapping()->appendOutputTo($filePath.'lz.txt');
        $schedule->command('sc:mm')->cron($run5)->withoutOverlapping()->appendOutputTo($filePath.'mm.txt');
    }

    /**
     * Register the Closure based commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        require base_path('routes/console.php');
    }
}
