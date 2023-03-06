<?php

namespace Database\Seeders;

use App\Contexts\Question\Domain\Models\Question;
use App\Contexts\Question\Domain\Models\QuestionType;
use Illuminate\Database\Seeder;

class QuestionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Question::factory()->count(9)->create([
            'type' => QuestionType::Graph->value
        ]);

        Question::factory()->count(1)->create([
            'type' => QuestionType::Open->value
        ]);
    }
}
