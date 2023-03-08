<?php

namespace App\Contexts\WordStat\AppLayer\Query;

use App\Contexts\WordStat\Infrastructure\WordStatRepository;

class WordStatFinder
{
    public function __construct(
        private readonly WordStatRepository $repository,
    ) {
    }

    public function execute(): array
    {
        return $this->repository->getRawWordStats();
    }
}
