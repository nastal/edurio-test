<?php

namespace App\Contexts\Question\Domain\Services;

use App\Contexts\Question\Domain\DTO\QuestionData;
use App\Contexts\Question\Infrastructure\QuestionRepository;

class QuestionService
{
    public function __construct(
        private readonly QuestionRepository $questionRepository,
    ) {
    }
    public function createQuestion(QuestionData $data): int
    {
        return $this->questionRepository->create($data);
    }
}
