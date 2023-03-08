<?php

namespace App\Contexts\Question\AppLayer\Handlers;

use App\Contexts\Question\Domain\DTO\QuestionData;
use App\Contexts\Question\Domain\Services\QuestionService;
use Illuminate\Foundation\Bus\Dispatchable;

class CreateQuestionHandler
{
    use Dispatchable;

    public function __construct(
        private readonly string $questionDataString,
    ) {
    }

    /**
     * @throws \Exception
     */
    public function handle(QuestionService $questionService): int
    {
        try {
            $data = QuestionData::fromJson($this->questionDataString);
        } catch (\Exception $e) {
            throw new \Exception('Invalid question data');
        }

        return $questionService->createQuestion($data);
    }
}
