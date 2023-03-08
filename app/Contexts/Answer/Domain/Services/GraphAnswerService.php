<?php

namespace App\Contexts\Answer\Domain\Services;

use App\Contexts\Answer\Domain\DTO\GraphAnswerData;
use App\Contexts\Answer\Infrastructure\GraphAnswerRepository;

class GraphAnswerService
{
    public function __construct(
        private readonly GraphAnswerRepository $graphAnswerRepository
    ) {
    }
    public function createGraphAnswer(GraphAnswerData $answerDataString): int
    {
        return $this->graphAnswerRepository->createGraphAnswer($answerDataString);
    }
}
