<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Contexts\Answer\Domain\Models\GraphAnswer;
use App\Contexts\Question\Domain\Models\Question;
use App\Contexts\Question\Domain\Models\QuestionType;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $questions = Question::factory()
            ->count(9)->create([
                'type' => QuestionType::Graph->value
        ]);

        $questions->each(function ($question) {
            GraphAnswer::factory(100)->create([
                'question_id' => $question->id
            ]);
        });

        /*     ->each(function ($question) {
             GraphAnswer::factory()->create([
                 'answer' => rand(0, 5)
             ]);
         });*/

        /*Question::factory()->count(1)->create([
            'type' => QuestionType::Open->value
        ]);*/
    }
}
