<?php

namespace App\Contexts\Answer\Domain\Observers;

use App\Contexts\Answer\Domain\Events\OpenAnswerCreated;
use Illuminate\Support\Facades\Log;

class CreateWordStat
{

    /**
     * Handle the event.
     */
    public function handle(OpenAnswerCreated $event): void
    {
        Log::info('CreateWordStat observer called');
    }
}
