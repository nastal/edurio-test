<?php

namespace Tests\Feature;

use App\Contexts\Answer\AppLayer\Query\AnswerAvarageFinder;
use App\Contexts\Answer\AppLayer\Query\AnswerCountFinder;
use App\Contexts\Answer\AppLayer\Query\AnswerPerQuestionFinder;
use App\Contexts\Answer\Domain\Models\GraphAnswer;
use App\Contexts\Question\Domain\Models\Question;
use App\Contexts\Question\Domain\Models\QuestionType;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;

class ApiQueryTests extends TestCase
{

    use DatabaseTransactions;
    public function test_getQuestionAvarage(): void
    {

        $questions = Question::factory()
            ->count(9)->create([
                'type' => QuestionType::Graph->value
            ]);

        $questions->each(function ($question) {
            GraphAnswer::factory(10)->create([
                'question_id' => $question->id
            ]);
        });

        $finder = app()->make(AnswerAvarageFinder::class);

        $results = $finder->execute();

        //randomizer avg value is between 2 and 3
        $this->assertTrue($results[0]->avarage > 2 && $results[0]->avarage < 3);
        $this->assertTrue($results[1]->avarage > 2 && $results[1]->avarage < 3);

    }

    public function test_questionAnswerCount(): void
    {

        Question::where('type', QuestionType::Graph->value)->delete();

        $questions = Question::factory()
            ->count(9)->create([
                'type' => QuestionType::Graph->value
            ]);

        $questions->each(function ($question) {
            GraphAnswer::factory(10)->create([
                'question_id' => $question->id
            ]);
        });

        $finder = app()->make(AnswerCountFinder::class);

        $results = $finder->execute();

        //randomizer avg value is between 2 and 3
        $this->assertTrue($results[0]->answer_count === 10);
        $this->assertTrue($results[8]->answer_count === 10);
    }


    public function test_answerPerQuestion() : void
    {

        Question::where('type', QuestionType::Graph->value)->delete();

        $questions = Question::factory()
            ->count(9)->create([
                'type' => QuestionType::Graph->value
            ]);

        $questions->each(function ($question) {
            GraphAnswer::factory(10)->create([
                'question_id' => $question->id
            ]);
        });

        $finder = app()->make(AnswerPerQuestionFinder::class);

        $results = $finder->execute($questions->last()->id);

        //randomizer avg value is between 2 and 3
        $this->assertCount(10, $results);
        $this->assertTrue($results[0]->question_id === $questions->last()->id);


    }

}
