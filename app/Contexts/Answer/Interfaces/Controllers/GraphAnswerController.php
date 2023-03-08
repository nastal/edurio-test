<?php

namespace app\Contexts\Answer\Interfaces\Controllers;

use App\Contexts\Answer\AppLayer\Query\AnswerAvarageFinder;
use App\Http\Controllers\Controller;

class GraphAnswerController extends Controller
{

    public function __construct(
        private readonly AnswerAvarageFinder $answerAvarageFinder,
    ) {
    }
    /**
     * Display a listing of the resource.
     */
    public function getAllAnswerGraphAvg(): array
    {
        return $this->answerAvarageFinder->execute();
    }

}
