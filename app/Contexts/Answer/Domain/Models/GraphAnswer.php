<?php

namespace App\Contexts\Answer\Domain\Models;

use app\Contexts\Question\Domain\Models\Question;
use Database\Factories\GraphAnswerFactory;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class GraphAnswer extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected static function newFactory(): Factory
    {
        return GraphAnswerFactory::new();
    }

    public function question(): BelongsTo
    {
        return $this->belongsTo(Question::class);
    }
}
