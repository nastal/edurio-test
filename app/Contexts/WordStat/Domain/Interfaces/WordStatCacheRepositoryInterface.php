<?php

namespace App\Contexts\WordStat\Domain\Interfaces;


interface WordStatCacheRepositoryInterface
{
    public function persist(): void;

    public function cacheAnswerWords(array $wordArray, int $answerId): void;

}
