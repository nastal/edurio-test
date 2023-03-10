<?php

namespace App\Console;

use App\Contexts\Answer\AppLayer\Commands\CreateGraphAnswerCommand;
use App\Contexts\Answer\AppLayer\Commands\CreateOpenAnswerCommand;
use App\Contexts\Question\AppLayer\Commands\CreateQuestionCommand;
use App\Contexts\WordStat\AppLayer\Command\PersistWordStatsCommand;
use App\Contexts\WordStat\AppLayer\Command\RebuildWordStatsCommand;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{

    protected $commands = [
        PersistWordStatsCommand::class,
        CreateQuestionCommand::class,
        CreateGraphAnswerCommand::class,
        CreateOpenAnswerCommand::class,
        RebuildWordStatsCommand::class,
    ];
    /**
     * Define the application's command schedule.
     */
    protected function schedule(Schedule $schedule): void
    {
        // $schedule->command('inspire')->hourly();
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
