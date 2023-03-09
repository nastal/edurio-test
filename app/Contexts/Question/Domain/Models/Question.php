<?php

namespace App\Contexts\Question\Domain\Models;

use App\Contexts\Answer\Domain\Models\GraphAnswer;
use App\Contexts\Question\Domain\DTO\QuestionData;
use Database\Factories\QuestionFactory;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Spatie\LaravelData\WithData;

class Question extends Model
{
    use HasFactory;

    use WithData;

    public $timestamps = false;

    protected string $dataClass = QuestionData::class;

    protected $fillable = [
        'title',
        'type',
    ];

    /**
     * Create a new factory instance for the model.
     *
     * @return Factory
     */
    protected static function newFactory(): Factory
    {
        return QuestionFactory::new();
    }

    public function graphAnswers(): HasMany
    {
        return $this->hasMany(GraphAnswer::class);
    }
}
