<?php

namespace app\Contexts\Question\Domain\Models;

use App\Contexts\Answer\Domain\Models\GraphAnswer;
use Database\Factories\QuestionFactory;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Question extends Model
{
    use HasFactory;

    public $timestamps = false;

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
