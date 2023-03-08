<?php

namespace App\Contexts\Answer\AppLayer\Commands;

use App\Contexts\Answer\AppLayer\Handlers\CreateGraphAnswerHandler;
use Illuminate\Console\Command;

class CreateGraphAnswerCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'create:graph-answer {answerDataString}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a graph answer';

    /**
     * Execute the console command.
     */
    public function handle(): void
    {
        $id = CreateGraphAnswerHandler::dispatchSync($this->argument('answerDataString'));
        $this->output->write($id);
    }
}
