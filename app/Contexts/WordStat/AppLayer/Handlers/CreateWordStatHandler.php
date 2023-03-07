<?php

namespace app\Contexts\WordStat\AppLayer\Handlers;


//fixme: make queueable
use App\Contexts\Answer\Domain\Events\OpenAnswerCreated;

class CreateWordStatHandler
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
    }

    /**
     * Handle the event.
     */
    public function handle(OpenAnswerCreated $event): void
    {
        app('log')->info($event->answer->answer);
    }
}
