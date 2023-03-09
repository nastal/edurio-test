<?php

namespace App\Contexts\Answer\Domain\Events;

use App\Contexts\Answer\Domain\Models\GraphAnswer;

class GraphAnswerCreated
{
    /**
     * Create a new event instance.
     * @param GraphAnswer $answer
     */
    public function __construct(public GraphAnswer $answer)
    {
    }

}
