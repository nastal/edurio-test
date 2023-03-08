<?php

namespace App\Contexts\WordStat\AppLayer\Handlers;

use App\Contexts\WordStat\Domain\Services\RebuildWordStat;

use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Support\Facades\Log;

class RebuildWordStatsHandler
{
    use Dispatchable;


    public function handle(RebuildWordStat $rebuildService): void
    {
        try {
            $rebuildService->rebuild();
        } catch (\Exception $e) {
            Log::error($e->getMessage());
        }
    }
}
