<?php

namespace app\Contexts\WordStat\AppLayer\Handlers;


use App\Contexts\Answer\Domain\Events\OpenAnswerCreated;
use App\Contexts\WordStat\Domain\Services\CreateWordStat;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

class CreateWordStatHandler implements ShouldQueue
{

    use InteractsWithQueue, Queueable;
    /**
     * Create the event listener.
     */
    public function __construct(private readonly CreateWordStat $service)
    {
    }

    /**
     * Handle the event.
     */
    public function handle(OpenAnswerCreated $event): void
    {
        try {

            $this->service->fullFillWord($event->answer->answer, $event->answer->id);

        } catch (\Exception $e) {
            Log::info('WordStat exception in handler : ' . $e->getMessage() . '');
        }
    }

}
