<?php

namespace App\Contexts\WordStat\Infrastructure;

use App\Contexts\WordStat\Domain\DTO\WordStatNestedValue;
use App\Contexts\WordStat\Domain\Interfaces\WordStatRepositoryInterface;
use App\Contexts\WordStat\Domain\Models\WordStats;
use Illuminate\Support\Facades\DB;

class WordStatRepository implements WordStatRepositoryInterface
{
    public function fulFillWord(array $wordArray, int $answerId): void
    {

        DB::transaction(function () {
            foreach ($wordArray as $valueWord) {
                $word = WordStats::firstOrNew(['word' => $valueWord]);

                if (!$word->exists) {
                    $word->count = 1;
                    $word->stats = [
                        WordStatNestedValue::from(
                            ['answer_id' => $answerId, 'count' => 1]
                        )
                    ];
                } else {

                    $word->count = $word->count + 1;
                    $exists = false;
                    foreach ($word->stats as $stat) {
                        if ($stat->answer_id === $answerId) {
                            $stat->count = $stat->count + 1;
                            $exists = true;
                        }
                    }

                    if (!$exists) {
                        $word->stats[] = WordStatNestedValue::from(
                            ['answer_id' => $answerId, 'count' => 1]
                        );
                    }
                }

                $word->save();
            }
        }, 5);

    }
}
