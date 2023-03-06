<?php

namespace Database\Factories;

use App\Contexts\Question\Domain\DTO\QuestionData;
use app\Contexts\Question\Domain\Models\Question;
use App\Contexts\Question\Domain\Models\QuestionType;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\app\Contexts\Question\Domain\Models\Question>
 */
class QuestionFactory extends Factory
{

    const TYPES = [
        QuestionType::Graph,
        QuestionType::Open
    ];

    protected $model = Question::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {

        return QuestionData::from([
            'title' => fake()->sentence(2),
            'type' => self::TYPES[rand(0, 1)]
        ])->toArray();
    }
}
