<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('word_stats', function (Blueprint $table) {
            $table->id();
            $table->string('word', 80);
            $table->unsignedInteger('count')->default(0);
            $table->json('stats');

            $table->index(['word']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('word_stats');
    }
};