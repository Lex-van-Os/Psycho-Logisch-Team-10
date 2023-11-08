<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('reflection_progressions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('reflection_id');
            $table->foreign('reflection_id')->references('id')->on('reflections');
            $table->integer('progress')->default(0);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('reflection_progressions');
    }
};
