<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * Define the application's command schedule.
     */
    protected function schedule(Schedule $schedule): void
    {
        // Ночная синхронизация с 1С — каждый день в 03:00 по Алматы
        $schedule->command('1c:sync')
            ->dailyAt('03:00')
            ->timezone('Asia/Almaty')
            ->withoutOverlapping(60) // если предыдущий синк ещё идёт — не запускать
            ->runInBackground();
    }

    /**
     * Register the commands for the application.
     */
    protected function commands(): void
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
