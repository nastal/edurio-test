<?php

namespace App\Contexts\Answer\Domain\DTO;

use App\Contexts\Question\Domain\Models\Question;
use Spatie\LaravelData\Attributes\Validation\Exists;
use Spatie\LaravelData\Attributes\Validation\Size;
use Spatie\LaravelData\Data;

class OpenAnswerData extends Data
{
    public function __construct(
        #[Exists(Question::class)]
        public int $question_id,
        #[Size(1500)]
        public string $answer,
    ) {
    }
}
