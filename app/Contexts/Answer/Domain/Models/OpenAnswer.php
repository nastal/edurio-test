<?php

namespace App\Contexts\Answer\Domain\Models;

use App\Contexts\Answer\Domain\Events\OpenAnswerCreated;
use App\Contexts\Question\Domain\Models\Question;
use Database\Factories\OpenAnswerFactory;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class OpenAnswer extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $dispatchesEvents = [
        'saved' => OpenAnswerCreated::class,
    ];

    protected static function newFactory(): Factory
    {
        return OpenAnswerFactory::new();
    }

    public function question(): BelongsTo
    {
        return $this->belongsTo(Question::class);
    }

}
