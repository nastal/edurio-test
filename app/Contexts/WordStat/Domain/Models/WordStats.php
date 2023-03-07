<?php

namespace App\Contexts\WordStat\Domain\Models;

use App\Contexts\WordStat\Domain\DTO\WordStatData;
use App\Contexts\WordStat\Domain\DTO\WordStatNestedValue;
use Illuminate\Database\Eloquent\Model;
use Spatie\LaravelData\DataCollection;
use Spatie\LaravelData\WithData;

class WordStats extends Model
{

    use WithData;

    public $timestamps = false;

    protected string $dataClass = WordStatData::class;

    protected $fillable = [
        'word',
        'count',
    ];

    protected $casts = [
        'stats' => DataCollection::class . ':' . WordStatNestedValue::class,
    ];

}
