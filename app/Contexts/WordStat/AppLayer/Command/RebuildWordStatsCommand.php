<?php

namespace App\Contexts\WordStat\AppLayer\Command;

use App\Contexts\WordStat\AppLayer\Handlers\PersistWordStatsHandler;
use Illuminate\Console\Command;

class RebuildWordStatsCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'word-stats:rebuild';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Will rebuild the word stats table';

    /**
     * Execute the console command.
     */
    public function handle(PersistWordStatsHandler $handler): void
    {
        //fixme recreate the word stats table
        //$handler::dispatch();
    }
}
