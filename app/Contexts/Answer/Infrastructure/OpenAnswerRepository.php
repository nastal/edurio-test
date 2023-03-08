<?php

namespace App\Contexts\Answer\Infrastructure;

use App\Contexts\Answer\Domain\DTO\OpenAnswerData;
use App\Contexts\Answer\Domain\Interfaces\OpenAnswerRepositoryInterface;
use App\Contexts\Answer\Domain\Models\OpenAnswer;

class OpenAnswerRepository implements OpenAnswerRepositoryInterface
{
    public function createOpenAnswer(OpenAnswerData $answerData): int
    {
        $model = new OpenAnswer(['question_id' => $answerData->question_id, 'answer' => $answerData->answer]);
        $model->save();
        return $model->id;
    }
}
