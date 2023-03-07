<?php

namespace App\Contexts\WordStat\Domain\DTO;

use Spatie\LaravelData\Attributes\DataCollectionOf;
use Spatie\LaravelData\Attributes\Validation\Max;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\DataCollection;

class WordStatData extends Data
{
    public function __construct(
        #[Max(80)]
        public string $word,
        public int $count,
    ) {
    }
}
