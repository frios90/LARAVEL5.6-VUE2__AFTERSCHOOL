<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TableTimesAdd extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('teacher_lessons', function (Blueprint $table) {
            $table->time('since_time');
            $table->time('until_time');   
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('teacher_lessons', function (Blueprint $table) {
            $table->dropColumn('since_time');
            $table->dropColumn('until_time');
        });
    }
}
