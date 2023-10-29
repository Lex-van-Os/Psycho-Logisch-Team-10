<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('closed_answers', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('question_id');
            $table->foreign('question_id')->references('id')->on('questions');
            $table->unsignedBigInteger('question_option_id');
            $table->foreign('question_option_id')->references('id')->on('question_options');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('closed_answers');
    }
};
