<?php

namespace Database\Factories;

use App\Contexts\Answer\Domain\DTO\GraphAnswerData;
use App\Contexts\Answer\Domain\Models\GraphAnswer;
use App\Contexts\Question\Domain\Models\Question;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\app\Contexts\Answer\Domain\Models\GraphAnswer>
 */
class GraphAnswerFactory extends Factory
{

    protected $model = GraphAnswer::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'answer' => rand(0, 5)
        ];
    }
}
