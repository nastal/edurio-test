<?php

namespace Tests\Feature;

use App\Contexts\Question\Domain\DTO\QuestionData;
use App\Contexts\Question\Domain\Models\QuestionType;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;

class CreateQuestionUseCaseTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    use DatabaseTransactions;


    public function test_createScalarQuestionTest(): void
    {

        $data = QuestionData::from([
            'title' => fake()->sentence(5),
            'type' => QuestionType::Graph,
        ]);


        $this->artisan('create:question', [
            'questionDataString' => $data->toJson()
        ]);

        $this->assertDatabaseHas('questions', [
            'title' => $data->title,
            'type'  => $data->type->value,
        ]);
    }

    public function test_createOpenQuestionTest(): void
    {

        $data = QuestionData::from([
            'title' => fake()->sentence(5),
            'type' => QuestionType::Open,
        ]);


        $this->artisan('create:question', [
            'questionDataString' => $data->toJson()
        ]);

        $this->assertDatabaseHas('questions', [
            'title' => $data->title,
            'type'  => $data->type->value,
        ]);
    }
}
