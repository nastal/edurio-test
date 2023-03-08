<?php

namespace App\Contexts\Answer\AppLayer\Handlers;


use App\Contexts\Answer\Domain\DTO\GraphAnswerData;
use App\Contexts\Answer\Domain\Services\GraphAnswerService;
use Illuminate\Support\Facades\Log;
use Illuminate\Foundation\Bus\Dispatchable;


class CreateGraphAnswerHandler
{

    use Dispatchable;
    /**
     * Create the event listener.
     */
    public function __construct(
        private readonly string $answerDataString
    ) {
    }

    /**
     * Handle the event.
     */
    public function handle(GraphAnswerService $service): int
    {
        try {
            $data = GraphAnswerData::from($this->answerDataString);
        } catch (\Exception $e) {
            Log::error('Invalid answer data');
            throw new \Exception('Invalid answer data');
        }
        return $service->createGraphAnswer($data);
    }
}
