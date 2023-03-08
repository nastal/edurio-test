<?php

namespace App\Contexts\Question\AppLayer\Commands;

use App\Contexts\Question\AppLayer\Handlers\CreateQuestionHandler;
use Illuminate\Console\Command;

class CreateQuestionCommand extends Command
{

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'create:question {questionDataString}';


    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create question';

    /**
     * Execute the console command.
     */
    public function handle(): void
    {
        $id = CreateQuestionHandler::dispatchSync($this->argument('questionDataString'));
        $this->output->write($id);
    }
}
