<?php

namespace App\Contexts\WordStat\Interfaces\Controllers;

use App\Contexts\WordStat\AppLayer\Query\WordStatFinder;
use App\Http\Controllers\Controller;

class WordStatController extends Controller
{
    public function __construct(
        private readonly WordStatFinder $wordStatFinder,
    ) {
    }
    public function getWordStats()
    {
        return $this->wordStatFinder->execute();
    }
}
