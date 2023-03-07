<?php

namespace App\Contexts\Answer\Domain\Events;

use App\Contexts\Answer\Domain\Models\OpenAnswer;

class OpenAnswerCreated
{
    /**
     * Create a new event instance.
     * @param OpenAnswer $answer
     */
    public function __construct(public OpenAnswer $answer)
    {
    }

}
