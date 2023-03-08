<?php

namespace App\Contexts\WordStat\Domain\Interfaces;


interface WordStatRebuildRepositoryInterface
{
    public function processAllOpenAnswers(): void;

    public function truncateWordStats(): void;

}
