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
        Schema::create('reflection_summaries', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained(); // Reference to the user table
            $table->foreignId('reflection_id')->constrained(); // Reference to the reflection table
            $table->text('summary'); // Text field for the summary

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reflection_summaries');
    }
};