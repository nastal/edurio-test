<?php

namespace App\Contexts\Answer\AppLayer\Query;

use App\Contexts\Answer\Infrastructure\GraphAnswerRepository;

class AnswerPerQuestionFinder
{
    public function __construct(
        private readonly GraphAnswerRepository $answerRepository,
    ) {
    }

    public function execute(int $questionId): array
    {
        //fixme: it's better to use pagination here
        return $this->answerRepository->getGraphAnswersByQuestionId($questionId);
    }
}
