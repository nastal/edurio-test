<?php

namespace App\Contexts\Answer\AppLayer\Handlers;


use App\Contexts\Answer\Domain\Events\GraphAnswerCreated;
use App\Contexts\Answer\Infrastructure\GraphAnswerRepository;
use Illuminate\Foundation\Bus\Dispatchable;


class FlushGraphCacheHandler
{

    use Dispatchable;
    /**
     * Create the event listener.
     */
    public function __construct(
        private readonly GraphAnswerRepository $graphAnswerRepository,
    ) {
    }

    /**
     * Handle the event.
     */
    public function handle(GraphAnswerCreated $event): void
    {
        $this->graphAnswerRepository->flushCache();
    }
}
