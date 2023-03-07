<?php

namespace App\Contexts\WordStat\Domain\Models;

use App\Contexts\WordStat\Domain\DTO\WordStatData;
use Illuminate\Database\Eloquent\Model;
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

}
