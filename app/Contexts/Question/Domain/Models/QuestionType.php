<?php

namespace App\Contexts\Question\Domain\Models;

enum QuestionType: string
{
    case Graph = 'graph';
    case Open = 'open';
}
