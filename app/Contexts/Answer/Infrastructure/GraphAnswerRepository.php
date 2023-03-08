<?php

namespace App\Contexts\Answer\Infrastructure;

use App\Contexts\Answer\Domain\Interfaces\GraphAnswerRepositoryInterface;
use App\Contexts\Answer\Domain\DTO\GraphAnswerData;
use App\Contexts\Answer\Domain\Models\GraphAnswer;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;

class GraphAnswerRepository implements GraphAnswerRepositoryInterface
{
    public function createGraphAnswer(GraphAnswerData $answerData): int
    {
        $model = new GraphAnswer(['question_id' => $answerData->question_id, 'answer' => $answerData->answer]);
        $model->save();
        return $model->id;
    }

    public function getAllGraphAnswersAvarage() : array
    {
        $model = new GraphAnswer();

        //Fatest Way around 50ms
        return Cache::remember('graph_answers', 60, function () use ($model) {
            return DB::table($model->getTable())
                ->select('question_id', DB::raw('AVG(answer) as avarage'))
                ->groupBy('question_id')
                ->get()->toArray();
        });


        //around 120ms
        /*return DB::table($model->getTable())
            ->select('question_id', DB::raw('AVG(answer) as avarage'))
            ->groupBy('question_id')
            ->get()->toArray();*/


        //around 250ms
        /*$graphAnswer = new GraphAnswer();
        $question = new Question();

        return DB::table($question->getTable())
            ->join($graphAnswer->getTable(), 'questions.id', '=', 'graph_answers.question_id')
            ->select('questions.id', DB::raw('AVG(graph_answers.answer) AS average'))
            ->groupBy('questions.id')
            ->get()
            ->toArray();*/
    }
}
