<?php

namespace App\Contexts\Answer\Domain\Interfaces;

use App\Contexts\Answer\Domain\DTO\GraphAnswerData;

interface GraphAnswerRepositoryInterface
{
    public function createGraphAnswer(GraphAnswerData $answerData): int;
}