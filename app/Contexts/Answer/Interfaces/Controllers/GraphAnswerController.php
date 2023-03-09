<?php

namespace App\Contexts\Answer\Interfaces\Controllers;

use App\Contexts\Answer\AppLayer\Commands\CreateGraphAnswerCommand;
use App\Contexts\Answer\AppLayer\Query\AnswerAvarageFinder;
use App\Contexts\Answer\AppLayer\Query\AnswerCountFinder;
use App\Contexts\Answer\AppLayer\Query\AnswerPerQuestionFinder;
use App\Contexts\Answer\Interfaces\Requests\StoreGraphAnswerRequest;
use App\Contexts\WordStat\AppLayer\Command\PersistWordStatsCommand;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;

class GraphAnswerController extends Controller
{

    public function __construct(
        private readonly AnswerAvarageFinder $answerAvarageFinder,
        private readonly AnswerCountFinder $answerCountFinder,
        private readonly AnswerPerQuestionFinder $answerPerQuestionFinder,
    ) {
    }
    /**
     * Display a listing of the resource.
     */
    public function getAllAnswerGraphAvg(): array
    {
        return $this->answerAvarageFinder->execute();
    }

    public function getAllAnswerGraphCount(): array
    {
        return $this->answerCountFinder->execute();
    }

    public function getAnswerPerQuestion(Request $request, $questionId): array
    {
        return $this->answerPerQuestionFinder->execute($questionId);
    }

    public function createGraphAnswer(StoreGraphAnswerRequest $request): array
    {
        //validate rest via data transfer object

        try {
            Artisan::call(CreateGraphAnswerCommand::class, [
                'answerDataString' => $request->getContent(),
            ]);
        } catch (\Exception $e) {
            return [
                'error' => $e->getMessage(),
            ];
        }

        return [
            'success' => true,
            'message' => 'Answer created',
            'id' => Artisan::output(),
        ];

    }

}
