<?php

namespace App\Contexts\WordStat\Domain\Interfaces;


interface WordStatRepositoryInterface
{
    public function getAllWordStats(): array;

}
