<?php

namespace App\Contexts\Question\Domain\Interfaces;

use App\Contexts\Question\Domain\DTO\QuestionData;

interface QuestionRepositoryInterface
{
    public function create(QuestionData $attributes): int;
}
