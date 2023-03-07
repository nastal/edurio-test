<?php

namespace App\Contexts\WordStat\Domain\Interfaces;


interface WordStatRepositoryInterface
{
    public function persistDirectly(array $wordArray, int $answerId): void;

    public function cacheAnswerWords(array $wordArray, int $answerId): void;

    public function batchMode(): bool;

    public function persistWordStats(): void;

}
