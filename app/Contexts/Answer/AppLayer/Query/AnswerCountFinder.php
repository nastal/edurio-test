<?php

namespace App\Contexts\Answer\AppLayer\Query;

use App\Contexts\Answer\Infrastructure\GraphAnswerRepository;

class AnswerCountFinder
{
    public function __construct(
        private readonly GraphAnswerRepository $answerRepository,
    ) {
    }

    public function execute(): array
    {
        return $this->answerRepository->getGraphAnswersCount();
    }
}
