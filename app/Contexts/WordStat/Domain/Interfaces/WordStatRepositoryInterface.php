<?php

namespace App\Contexts\WordStat\Domain\Interfaces;


interface WordStatRepositoryInterface
{
    public function fulFillWord(array $wordArray, int $answerId): void;

}
