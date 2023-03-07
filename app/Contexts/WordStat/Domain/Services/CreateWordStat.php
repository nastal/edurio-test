<?php

namespace App\Contexts\WordStat\Domain\Services;

use App\Contexts\WordStat\Infrastructure\WordStatRepository;

class CreateWordStat
{

    public function __construct(private readonly WordStatRepository $repository)
    {
    }

    public function fullFillWord(array $wordArray, int $answerId): void
    {
        if ($this->repository->batchMode()) {
            $this->cacheAnswerWords($wordArray, $answerId);
            //fixme call command to process cache
            return;

        }
        $this->repository->persistDirectly($wordArray, $answerId);
    }

    public function persistWordStats(): void
    {
        $this->repository->persistWordStats();
    }

    private function cacheAnswerWords(array $wordArray, int $answerId): void
    {
        $this->repository->cacheAnswerWords($wordArray, $answerId);
    }

    public function batchMode(): bool
    {
        return $this->repository->batchMode();
    }

}
