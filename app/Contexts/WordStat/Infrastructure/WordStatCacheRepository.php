<?php

namespace App\Contexts\WordStat\Infrastructure;

use App\Contexts\WordStat\Domain\DTO\WordStatData;
use App\Contexts\WordStat\Domain\Interfaces\WordStatCacheRepositoryInterface;
use App\Contexts\WordStat\Domain\Models\WordStats;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;

class WordStatCacheRepository implements WordStatCacheRepositoryInterface
{

    const WORD_PREFIX = 'word_stats';
    /**
     * Warning: Deadlocks on batch processing
     */
    public function persistDirectly(array $wordArray, int $answerId): void
    {

        //fixme answer id is not used
        DB::transaction(function () use ($wordArray, $answerId) {
            foreach ($wordArray as $valueWord) {
                $word = WordStats::firstOrNew(['word' => $valueWord]);

                if (!$word->exists) {
                    $word->count = 1;
                } else {
                    $word->count = $word->count + 1;
                }

                $word->save();
            }
        }, 5);

    }

    /**
     * Let's cache it in batch mode
     * @param array $wordArray
     * @param int $answerId
     * @return array
     */
    public function cacheAnswerWords(array $wordArray, int $answerId): void
    {
        //fixme you can use additional meta such as answer id to make it more accurate
        $cachedWords = $this->getCachedWordStats();
        foreach ($wordArray as $word) {
            if (array_key_exists($word, $cachedWords)) {
                $cachedWords[$word] = $cachedWords[$word] + 1;
            } else {
                $cachedWords[$word] = 1;
            }
        }

        Cache::tags(self::WORD_PREFIX)->put(self::WORD_PREFIX, $cachedWords, 24 * 60 * 60);

    }

    public function getCachedWordStats(): array
    {
        return Cache::tags(self::WORD_PREFIX)->has(self::WORD_PREFIX) ?
            Cache::tags(self::WORD_PREFIX)->get(self::WORD_PREFIX) :
            [];
    }

    public function persist(): void
    {
        $wordStats = Cache::tags(self::WORD_PREFIX)->get(self::WORD_PREFIX);

        $collection = collect($wordStats)->map(function ($item, $key) {
            return new WordStatData($key, $item);
        });

        if ($collection->count() < 1) {
            return;
        }

        DB::transaction(function () use ($collection) {
            foreach ($collection as $data) {
                $word = WordStats::firstOrNew(['word' => $data->word]);

                if (!$word->exists) {
                    $word->count = $data->count;
                } else {
                    $word->count = $word->count + $data->count;
                }

                $word->save();
            }
        }, 5);

        //clear cache
        Cache::tags(self::WORD_PREFIX)->flush();

    }
}
