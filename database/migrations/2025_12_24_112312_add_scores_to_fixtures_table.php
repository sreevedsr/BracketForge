<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('fixtures', function (Blueprint $table) {
            $table->unsignedInteger('home_score')->nullable()->after('away_team_id');
            $table->unsignedInteger('away_score')->nullable()->after('home_score');

            $table->foreignId('winner_team_id')
                ->nullable()
                ->constrained('teams')
                ->nullOnDelete()
                ->after('away_score');
        });
    }

    public function down(): void
    {
        Schema::table('fixtures', function (Blueprint $table) {
            $table->dropForeign(['winner_team_id']);
            $table->dropColumn(['home_score', 'away_score', 'winner_team_id']);
        });
    }

};
