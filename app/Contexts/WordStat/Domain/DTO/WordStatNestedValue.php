<?php

namespace App\Contexts\WordStat\Domain\DTO;

use App\Contexts\Answer\Domain\Models\OpenAnswer;
use app\Contexts\Question\Domain\Models\Question;
use App\Contexts\WordStat\Domain\Models\WordStats;
use Spatie\LaravelData\Attributes\DataCollectionOf;
use Spatie\LaravelData\Attributes\Validation\Exists;
use Spatie\LaravelData\Attributes\Validation\Max;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\DataCollection;

class WordStatNestedValue extends Data
{
    public function __construct(
        public int $answer_id,
        public int $count,
    ) {
    }

}
