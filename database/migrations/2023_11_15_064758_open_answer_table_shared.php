<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('open_answers', function (Blueprint $table) {
            $table->boolean('shared')->default(false);
        });
    }

    public function down()
    {
        Schema::table('open_answers', function (Blueprint $table) {
            $table->dropColumn('shared');
        });
    }
};
