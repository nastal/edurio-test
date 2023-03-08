<?php

namespace app\Contexts\Answer\Interfaces\Controllers;

use App\Contexts\Answer\AppLayer\Query\AnswerAvarageFinder;
use App\Contexts\Answer\AppLayer\Query\AnswerCountFinder;
use App\Contexts\Answer\AppLayer\Query\AnswerPerQuestionFinder;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

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

}
