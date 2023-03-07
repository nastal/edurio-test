<?php

namespace App\Contexts\WordStat\Domain\Services;

use App\Contexts\WordStat\Infrastructure\WordStatRepository;
use Illuminate\Support\Facades\Log;

class CreateWordStat
{

    public function __construct(private readonly WordStatRepository $repository)
    {
    }

    public function fullFillWord(array $wordArray, int $answerId): void
    {
        $this->repository->fulFillWord($wordArray, $answerId);
    }

}
