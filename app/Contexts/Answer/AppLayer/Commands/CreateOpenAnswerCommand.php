<?php

namespace App\Contexts\Answer\AppLayer\Commands;

use App\Contexts\Answer\AppLayer\Handlers\CreateOpenAnswerHandler;
use Illuminate\Console\Command;

class CreateOpenAnswerCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'create:open-answer {answerDataString}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create an open answer';

    /**
     * Execute the console command.
     */
    public function handle(): void
    {
        $id = CreateOpenAnswerHandler::dispatchSync($this->argument('answerDataString'));
        $this->output->write($id);
    }
}
