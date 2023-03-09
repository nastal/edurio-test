<?php

namespace App\Contexts\Answer\Domain\DTO;

use App\Contexts\Question\Domain\Models\Question;
use Spatie\LaravelData\Attributes\Validation\Exists;
use Spatie\LaravelData\Attributes\Validation\Max;
use Spatie\LaravelData\Data;

class GraphAnswerData extends Data
{
    public function __construct(
        #[Exists(Question::class)]
        public int $question_id,
        #[Max(5)]
        public int $answer,
    ) {
    }
}
