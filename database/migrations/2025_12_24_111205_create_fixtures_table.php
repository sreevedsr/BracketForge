<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('fixtures', function (Blueprint $table) {
            $table->id();

            $table->foreignId('tournament_id')
                ->constrained()
                ->cascadeOnDelete();

            $table->foreignId('home_team_id')
                ->constrained('teams');

            $table->foreignId('away_team_id')
                ->constrained('teams');

            $table->unsignedInteger('round')->nullable();

            $table->enum('status', ['pending', 'completed'])
                ->default('pending');

            $table->timestamp('scheduled_at')->nullable();

            $table->timestamps();

            $table->index(['tournament_id', 'round']);
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('fixtures');
    }
};
