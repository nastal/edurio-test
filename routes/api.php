<?php

use App\Contexts\Answer\Interfaces\Controllers\GraphAnswerController;
use App\Contexts\Answer\Interfaces\Controllers\OpenAnswerController;
use App\Contexts\WordStat\Interfaces\Controllers\WordStatController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/graph/answer-average', [GraphAnswerController::class, 'getAllAnswerGraphAvg'])->name('answer.avg');
Route::get('/graph/answer-count', [GraphAnswerController::class, 'getAllAnswerGraphCount'])->name('answer.count');
Route::get('/graph/question-answer/{questionId}', [GraphAnswerController::class, 'getAnswerPerQuestion'])->name('answer.per_question');

Route::post('/graph/question-answer', [GraphAnswerController::class, 'createGraphAnswer'])->name('answer.create');
Route::post('/open/question-answer', [OpenAnswerController::class, 'createOpenAnswer'])->name('answer_open.create');

Route::get('/open/word-stats', [WordStatController::class, 'getWordStats'])->name('answer.open.word_stats');
