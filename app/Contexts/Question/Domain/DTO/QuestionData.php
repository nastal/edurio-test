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

    public static function fromJson(string $data): QuestionData
    {
        $data = json_decode($data, true);

        $question = QuestionType::from($data['type']);

        return new self(
            $data['title'],
            $question,
        );
    }

}
