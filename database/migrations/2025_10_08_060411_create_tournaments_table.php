<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('tournaments', function (Blueprint $table) {
            $table->id();

            // SaaS owner
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();

            $table->string('name');
            $table->text('description')->nullable();

            // league | round_robin | knockout | hybrid
            $table->string('type');

            $table->unsignedInteger('max_teams')->nullable();
            $table->unsignedInteger('qualified_teams')->nullable(); // for league → knockout

            // draft | ongoing | completed
            $table->string('status')->default('draft');

            $table->timestamp('starts_at')->nullable();
            $table->timestamp('ends_at')->nullable();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('tournaments');
    }
};
