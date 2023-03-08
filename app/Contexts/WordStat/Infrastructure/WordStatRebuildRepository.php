<?php

namespace App\Contexts\WordStat\Infrastructure;

use App\Contexts\Answer\Domain\Models\OpenAnswer;
use App\Contexts\WordStat\Domain\Interfaces\WordStatRebuildRepositoryInterface;
use App\Contexts\WordStat\Domain\Models\WordStats;
use App\Contexts\WordStat\Domain\Services\CreateWordStat;
use App\Contexts\WordStat\Domain\Services\RebuildWordStat;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\DB;

class WordStatRebuildRepository implements WordStatRebuildRepositoryInterface
{

    public function __construct(
        private readonly CreateWordStat $creationService,
    ) {
    }

    public function processAllOpenAnswers(): void
    {

        $this->truncateWordStats();

        //fixme get from service
        OpenAnswer::chunk(100, function (Collection $openAnswers) {
            foreach ($openAnswers as $answer) {
                $this->creationService->fullFillWord($answer->answer, $answer->id);
            }
        });

        $this->creationService->persistWordStats();

    }

    public function truncateWordStats(): void
    {
        WordStats::query()->delete();
    }
}
