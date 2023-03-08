<?php

namespace App\Contexts\Answer\Infrastructure;

use App\Contexts\Answer\Domain\Interfaces\GraphAnswerRepositoryInterface;
use App\Contexts\Answer\Domain\DTO\GraphAnswerData;
use App\Contexts\Answer\Domain\Models\GraphAnswer;
use App\Contexts\Question\Domain\Models\Question;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;

class GraphAnswerRepository implements GraphAnswerRepositoryInterface
{

    const ANSWER_AVG = 'graph_answers';
    const ANSWER_COUNT = 'graph_count';
    public function createGraphAnswer(GraphAnswerData $answerData): int
    {
        $model = new GraphAnswer(['question_id' => $answerData->question_id, 'answer' => $answerData->answer]);
        $model->save();
        return $model->id;
    }

    public function getAllGraphAnswersAvarage() : array
    {
        $model = new GraphAnswer();

        //Fastest Way around 50ms
        return Cache::remember(self::ANSWER_AVG, 3600, function () use ($model) {
            return DB::table($model->getTable())
                ->select('question_id', DB::raw('AVG(answer) as avarage'))
                ->groupBy('question_id')
                ->get()->toArray();
        });

        //I keep it here for your reference, so you can see the sandbox results
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

    public function getGraphAnswersCount() : array
    {
        $answer = new GraphAnswer();
        $question = new Question();

        return Cache::remember(self::ANSWER_COUNT, 3600, function () use ($answer, $question) {
            return DB::table($question->getTable())
                ->join($answer->getTable(), $question->getTable() . '.id', '=', $answer->getTable() . '.question_id')
                ->select($question->getTable() . '.id', DB::raw('COUNT(*) AS answer_count'))
                ->groupBy($question->getTable() . '.id')
                ->get()
                ->toArray();
        });
    }

}
