<?php

namespace app\Contexts\Answer\Domain\Events;

use App\Contexts\Answer\Domain\Models\OpenAnswer;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;

class OpenAnswerCreated
{
    use Dispatchable, SerializesModels;

    /**
     * Create a new event instance.
     */
    public function __construct(public OpenAnswer $answer)
    {
    }

}
