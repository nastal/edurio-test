<?php

namespace App\Contexts\Answer\Infrastructure;

use App\Contexts\Answer\Domain\Interfaces\GraphAnswerRepositoryInterface;
use App\Contexts\Answer\Domain\DTO\GraphAnswerData;
use App\Contexts\Answer\Domain\Models\GraphAnswer;

class GraphAnswerRepository implements GraphAnswerRepositoryInterface
{
    public function createGraphAnswer(GraphAnswerData $answerData): int
    {
        $model = new GraphAnswer(['question_id' => $answerData->question_id, 'answer' => $answerData->answer]);
        $model->save();
        return $model->id;
    }
}
