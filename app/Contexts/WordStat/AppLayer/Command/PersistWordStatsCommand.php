<?php

namespace App\Contexts\WordStat\AppLayer\Command;

use App\Contexts\WordStat\AppLayer\Handlers\PersistWordStatsHandler;
use Illuminate\Console\Command;

class PersistWordStatsCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'word-stats:persist';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle(PersistWordStatsHandler $handler): void
    {
        $handler::dispatch();
    }
}
