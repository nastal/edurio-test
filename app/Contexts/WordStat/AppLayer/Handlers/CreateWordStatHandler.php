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
        $words = $this->getWords($event->answer->answer);

        try {
            //fixme batch strategy
            $this->service->fullFillWord($words, $event->answer->id);

        } catch (\Exception $e) {
            Log::info('WordStat exception in handler : ' . $e->getMessage() . '');
        }
    }

    private function getWords(string $answer): array
    {
        $rawText = preg_replace("/[^\w\s]/", "", $answer);

        $words = Str::of($rawText)->lower()->split('/\s+/');

        return $words->toArray();
    }
}
