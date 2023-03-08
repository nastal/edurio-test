<?php

namespace App\Contexts\WordStat\Infrastructure;

use App\Contexts\WordStat\Domain\DTO\WordStatData;
use App\Contexts\WordStat\Domain\Interfaces\WordStatRepositoryInterface;
use App\Contexts\WordStat\Domain\Models\WordStats;

class WordStatRepository implements WordStatRepositoryInterface
{
    
    public function getAllWordStats(): array
    {
        $wordStats = WordStats::all();
        $wordStatsArray = [];
        foreach ($wordStats as $wordStat) {
            $wordStatsArray[] = new WordStatData($wordStat->word, $wordStat->count);
        }
        return $wordStatsArray;
    }
}
