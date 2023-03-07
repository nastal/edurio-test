<?php

namespace app\Contexts\WordStat\Domain\Interfaces;

use app\Contexts\WordStat\Domain\DTO\WordStatData;

interface WordStatRepositoryInterface
{
    public function findByWord(string $word): ?WordStatData;

    public function create(WordStatData $wordStatData): void;

    public function update(WordStatData $wordStatData): void;
}
