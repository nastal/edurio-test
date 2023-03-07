<?php

namespace App\Contexts\WordStat\Infrastructure;

use app\Contexts\WordStat\Domain\DTO\WordStatData;
use app\Contexts\WordStat\Domain\Interfaces\WordStatRepositoryInterface;
use app\Contexts\WordStat\Domain\Models\WordStats;

class WordStatRepository implements WordStatRepositoryInterface
{
    public function findByWord(string $word): ?WordStatData
    {
        //fixme implement
        return WordStatData::fromModel(WordStats::where('word', $word)->first());
    }

    public function create(WordStatData $wordStatData): void
    {
        //fixme implement
        WordStats::create($wordStatData->toArray());
    }

    public function update(WordStatData $wordStatData): void
    {
        //fixme implement
        WordStats::where('word', $wordStatData->word)->update($wordStatData->toArray());
    }

}
