<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('reflection_questions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('question_id');
            $table->foreign('question_id')->references('id')->on('questions');
            $table->unsignedBigInteger('reflection_id');
            $table->foreign('question_id')->references('id')->on('reflections');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('reflection_questions');
    }
};
