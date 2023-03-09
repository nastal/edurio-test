<?php

namespace App\Contexts\Answer\Interfaces\Controllers;

use App\Contexts\Answer\AppLayer\Commands\CreateOpenAnswerCommand;
use App\Contexts\Answer\Interfaces\Requests\StoreOpenAnswerRequest;
use App\Contexts\WordStat\AppLayer\Command\PersistWordStatsCommand;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Artisan;

class OpenAnswerController extends Controller
{

    public function createOpenAnswer(StoreOpenAnswerRequest $request): array
    {
        //validate rest via data transfer object

        try {
            Artisan::call(CreateOpenAnswerCommand::class, [
                'answerDataString' => $request->getContent(),
            ]);
        } catch (\Exception $e) {
            return [
                'error' => $e->getMessage(),
            ];
        }

        //persist cached word stats
        Artisan::call(PersistWordStatsCommand::class);

        return [
            'success' => true,
            'message' => 'Answer created',
            'id' => Artisan::output(),
        ];

    }

}
