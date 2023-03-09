<?php

namespace Tests\Feature;

use App\Contexts\Answer\Domain\Models\OpenAnswer;
use App\Contexts\Question\Domain\Models\Question;
use App\Contexts\Question\Domain\Models\QuestionType;
use App\Contexts\WordStat\AppLayer\Command\RebuildWordStatsCommand;
use App\Contexts\WordStat\Domain\Models\WordStats;
use Illuminate\Foundation\Testing\DatabaseTransactions;

use Illuminate\Support\Facades\Queue;
use Tests\TestCase;

class WordStatTest extends TestCase
{

    use DatabaseTransactions;
    /**
     * A basic feature test example.
     */
    public function test_rebuild(): void
    {

        //prevent domain events
        Queue::fake();

        OpenAnswer::query()->delete();

        $questionsOpen = Question::factory()->create([
            'type' => QuestionType::Open->value
        ]);

        OpenAnswer::factory(100)->create([
            'question_id' => $questionsOpen->id
        ]);

        WordStats::query()->delete();

        //nesure domain events not working
        $this->assertDatabaseEmpty('word_stats');

        $this->artisan(RebuildWordStatsCommand::class)->assertExitCode(0);

        //magical 182 words from faker))
        $this->assertDatabaseCount('word_stats', 182);

    }
}
