<?php

namespace app\Contexts\WordStat\Domain\DTO;

use App\Contexts\Answer\Domain\Models\OpenAnswer;
use app\Contexts\Question\Domain\Models\Question;
use Spatie\LaravelData\Attributes\Validation\Exists;
use Spatie\LaravelData\Attributes\Validation\Max;
use Spatie\LaravelData\Data;

class WordStatData extends Data
{
    public function __construct(
        #[Max(80)]
        public string $word,
        public int $count,
        #[Exists(OpenAnswer::class)]
        public int $answer_id,
        #[Exists(Question::class)]
        public int $question_id,
        public int $answer_count,
    ) {
    }
}
