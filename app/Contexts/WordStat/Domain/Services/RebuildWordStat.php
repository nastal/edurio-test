<?php

namespace App\Contexts\WordStat\Domain\Services;

use App\Contexts\WordStat\Infrastructure\WordStatRebuildRepository;

class RebuildWordStat
{
    public function __construct(
        private readonly WordStatRebuildRepository $repository,
    ) {
    }

    public function rebuild(): void
    {
        $this->repository->processAllOpenAnswers();
    }

    public function truncateWordStats(): void
    {
        $this->repository->truncateWordStats();
    }
}
