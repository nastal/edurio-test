<?php

use App\Contexts\Answer\Interfaces\Controllers\GraphAnswerController;
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

Route::get('/graph/answer-avarage', [GraphAnswerController::class, 'getAllAnswerGraphAvg'])->name('answer.avg');
Route::get('/graph/answer-count', [GraphAnswerController::class, 'getAllAnswerGraphCount'])->name('answer.count');
Route::get('/graph/question-answer/{questionId}', [GraphAnswerController::class, 'getAnswerPerQuestion'])->name('answer.per_question');
