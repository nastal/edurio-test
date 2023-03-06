<?php

namespace Database\Factories;

use App\Contexts\Answer\Domain\Models\OpenAnswer;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Contexts\Answer\Domain\Models\OpenAnswer>
 */
class OpenAnswerFactory extends Factory
{

    protected $model = OpenAnswer::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'answer' => $this->faker->paragraph(15, true)
        ];
    }
}
