<?php

namespace Database\Seeders;

use App\Contexts\WordStat\AppLayer\Command\RebuildWordStatsCommand;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Contexts\Answer\Domain\Models\OpenAnswer;
use App\Contexts\Question\Domain\Models\Question;
use App\Contexts\Question\Domain\Models\QuestionType;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Artisan;

class DatabaseSeeder extends Seeder
{

    use WithoutModelEvents;
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        /*$questions = Question::factory()
            ->count(9)->create([
                'type' => QuestionType::Graph->value
        ]);

        $questions->each(function ($question) {
            GraphAnswer::factory(100000)->create([
                'question_id' => $question->id
            ]);
        });*/

        $questionsOpen = Question::factory()->create([
                'type' => QuestionType::Open->value
            ]);

        OpenAnswer::factory(10000)->create([
            'question_id' => $questionsOpen->id
        ]);

        Artisan::call(RebuildWordStatsCommand::class);
    }
}
