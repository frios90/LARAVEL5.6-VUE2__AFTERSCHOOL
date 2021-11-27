<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TableTimeAler extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('teacher_lessons', function (Blueprint $table) {
            $table->dropColumn('since_time');
            $table->dropColumn('until_time');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // Schema::table('teacher_lessons', function (Blueprint $table) {
        //     $table->string('since_time');
        //     $table->string('until_time');   
        // });
    }
}
