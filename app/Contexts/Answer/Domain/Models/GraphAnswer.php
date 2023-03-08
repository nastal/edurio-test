<?php

namespace App\Contexts\Answer\Domain\Models;

use App\Contexts\Answer\Domain\DTO\GraphAnswerData;
use app\Contexts\Question\Domain\Models\Question;
use Database\Factories\GraphAnswerFactory;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Spatie\LaravelData\WithData;

class GraphAnswer extends Model
{
    use HasFactory;
    use WithData;
    
    protected $fillable = [
        'question_id',
        'answer',
    ];

    protected string $dataClass = GraphAnswerData::class;

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
