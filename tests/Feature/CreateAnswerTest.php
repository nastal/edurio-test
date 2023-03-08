<?php

namespace Tests\Feature;

use App\Contexts\Answer\AppLayer\Commands\CreateGraphAnswerCommand;
use App\Contexts\Answer\AppLayer\Commands\CreateOpenAnswerCommand;
use App\Contexts\Answer\AppLayer\Handlers\CreateOpenAnswerHandler;
use App\Contexts\Answer\Domain\DTO\GraphAnswerData;
use App\Contexts\Answer\Domain\DTO\OpenAnswerData;
use App\Contexts\Question\Domain\Models\Question;
use App\Contexts\Question\Domain\Models\QuestionType;
use App\Contexts\WordStat\AppLayer\Command\PersistWordStatsCommand;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Support\Str;
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
            'answer' => rand(0, 5),
        ]);

        $this->artisan(CreateGraphAnswerCommand::class, [
            'answerDataString' => $data->toJson()
        ]);

        $this->assertDatabaseHas('graph_answers', [
            'question_id' => $data->question_id,
            'answer' => $data->answer,
        ]);
    }

    public function test_createOpenAnswer(): void
    {

        $question = Question::factory()->count(1)->create(
            [
                'title' => fake()->sentence(5),
                'type' => QuestionType::Open->value,
            ]
        )->first();

        $data = OpenAnswerData::from([
            'question_id' => $question->id,
            'answer'      => fake()->paragraph(5),
        ]);

        $this->artisan(CreateOpenAnswerCommand::class, [
            'answerDataString' => $data->toJson()
        ]);

        $this->assertDatabaseHas('open_answers', [
            'question_id' => $data->question_id,
            'answer' => $data->answer,
        ]);

        $this->artisan(PersistWordStatsCommand::class);

        $rawText = preg_replace("/[^\w\s]/", "", $data->answer);

        $words = Str::of($rawText)->lower()->split('/\s+/')->toArray();

        $this->assertDatabaseHas('word_stats', [
            'word' => $words[0],
        ]);
    }
}
