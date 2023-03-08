<?php

namespace App\Contexts\Answer\AppLayer\Handlers;


use App\Contexts\Answer\Domain\DTO\OpenAnswerData;
use App\Contexts\Answer\Domain\Services\OpenAnswerService;
use Illuminate\Support\Facades\Log;
use Illuminate\Foundation\Bus\Dispatchable;


class CreateOpenAnswerHandler
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
    public function handle(OpenAnswerService $service): int
    {
        try {
            $data = OpenAnswerData::from($this->answerDataString);
        } catch (\Exception $e) {
            Log::error('Invalid answer data');
            throw new \Exception('Invalid answer data');
        }
        return $service->createOpenAnswer($data);
    }
}
