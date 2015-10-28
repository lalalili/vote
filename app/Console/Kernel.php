<?php

namespace app\Console;

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
        \App\Console\Commands\Inspire::class,
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
//        $schedule->command('inspire')
//                 ->hourly();
        $schedule->command('backup:clean')->sendOutputTo('/home/vagrant/log/clean.txt')->emailOutputTo('lalalili@gmail.com');
        $schedule->command('backup:run')->sendOutputTo('/home/vagrant/log/run.txt')->emailOutputTo('lalalili@gmail.com');
    }
}
