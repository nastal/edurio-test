<?php

namespace App\Contexts\WordStat\Domain\Services;

use App\Contexts\WordStat\Infrastructure\WordStatCacheRepository;
use App\Contexts\WordStat\Infrastructure\WordStatRepository;

class CreateWordStat
{
    public function __construct(
        private readonly WordStatRepository $repository,
        private readonly WordStatCacheRepository $cacheRepository
    ) {
    }

    public function fullFillWord(array $wordArray, int $answerId): void
    {
        $this->cacheAnswerWords($wordArray, $answerId);
    }

    public function persistWordStats(): void
    {
        $this->cacheRepository->persist();
    }

    private function cacheAnswerWords(array $wordArray, int $answerId): void
    {
        $this->cacheRepository->cacheAnswerWords($wordArray, $answerId);
    }

    public function getWordCachedStats(): array
    {
        return $this->cacheRepository->getCachedWordStats();
    }

    public function getPersistedStats(): array
    {
        return $this->repository->getAllWordStats();
    }
}
