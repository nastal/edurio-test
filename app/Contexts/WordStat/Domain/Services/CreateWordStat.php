<?php

namespace App\Contexts\Answer\Domain\Observers;

use App\Contexts\Answer\Domain\Models\OpenAnswer;
use Illuminate\Support\Facades\Log;

class CreateWordStat
{

    /**
     * Handle the event.
     */
    public function __invoke(OpenAnswer $openAnswer): void
    {
        Log::info('CreateWordStat observer called');
    }
}
