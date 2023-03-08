<?php

namespace App\Contexts\Question\Infrastructure;

use App\Contexts\Question\Domain\DTO\QuestionData;
use App\Contexts\Question\Domain\Interfaces\QuestionRepositoryInterface;
use App\Contexts\Question\Domain\Models\Question;

class QuestionRepository implements QuestionRepositoryInterface
{
    public function create(QuestionData $attributes): int
    {
        $question = new Question(['title' => $attributes->title, 'type' => $attributes->type->value]);
        $question->save();
        return $question->id;
    }

}
