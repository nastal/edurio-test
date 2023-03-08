<?php

namespace App\Contexts\Answer\Domain\Interfaces;

use App\Contexts\Answer\Domain\DTO\OpenAnswerData;

interface OpenAnswerRepositoryInterface
{
    public function createOpenAnswer(OpenAnswerData $answerData): int;
}
