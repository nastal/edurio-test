<?php

namespace App\Contexts\Question\Domain\DTO;


use App\Contexts\Question\Domain\Models\QuestionType;
use Spatie\LaravelData\Data;

class QuestionData extends Data
{
    public function __construct(
        public string $title,
        public QuestionType $type,
    ) {
    }
}
