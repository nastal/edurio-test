<?php

namespace App\Contexts\WordStat\Domain\Services;

use App\Contexts\WordStat\Infrastructure\WordStatCacheRepository;
use App\Contexts\WordStat\Infrastructure\WordStatRepository;
use Illuminate\Support\Str;

class CreateWordStat
{
    public function __construct(
        private readonly WordStatRepository $repository,
        private readonly WordStatCacheRepository $cacheRepository
    ) {
    }

    public function fullFillWord(string $text, int $answerId): void
    {
        $wordArray = $this->getWordsFromText($text);
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

    private function getWordsFromText(string $text): array
    {
        $rawText = preg_replace("/[^\w\s]/", "", $text);

        $words = Str::of($rawText)->lower()->split('/\s+/');

        return $words->toArray();
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
