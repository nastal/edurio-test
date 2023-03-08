<?php

namespace App\Contexts\Answer\Domain\Services;

use App\Contexts\Answer\Domain\DTO\OpenAnswerData;
use App\Contexts\Answer\Infrastructure\OpenAnswerRepository;

class OpenAnswerService
{
    public function __construct(
        private readonly OpenAnswerRepository $openAnswerRepository
    ) {
    }
    public function createOpenAnswer(OpenAnswerData $answerData): int
    {
        return $this->openAnswerRepository->createOpenAnswer($answerData);
    }
}
