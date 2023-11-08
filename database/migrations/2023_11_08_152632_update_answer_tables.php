<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('closed_answers', function (Blueprint $table) {
            $table->unsignedBigInteger('reflection_id');
            $table->foreign('reflection_id')->references('id')->on('reflections');
        });
        Schema::table('open_answers', function (Blueprint $table) {
            $table->unsignedBigInteger('reflection_id');
            $table->foreign('reflection_id')->references('id')->on('reflections');;
        });
    }

    public function down(): void
    {
        Schema::table('open_answers', function (Blueprint $table) {
            //
        });
    }
};
