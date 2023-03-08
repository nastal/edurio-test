<?php

namespace Tests\Feature;

use App\Contexts\Answer\Domain\DTO\GraphAnswerData;
use App\Contexts\Question\Domain\Models\Question;
use App\Contexts\Question\Domain\Models\QuestionType;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;

class CreateAnswerTest extends TestCase
{
    use DatabaseTransactions;

    public function test_createScalarAnswer(): void
    {

        $question = Question::factory()->count(1)->create(
            [
                'title' => fake()->sentence(5),
                'type' => QuestionType::Graph->value,
            ]
        )->first();

        $data = GraphAnswerData::from([
            'question_id' => $question->id,
            'answer' => rand(1, 5),
        ]);

        $this->artisan('create:graph-answer', [
            'answerDataString' => $data->toJson()
        ]);

        $this->assertDatabaseHas('graph_answers', [
            'question_id' => $data->question_id,
            'answer' => $data->answer,
        ]);
    }
}
