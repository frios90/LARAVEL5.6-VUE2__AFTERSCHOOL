<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTeacherLessons extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('teacher_lessons', function (Blueprint $table) {
            $table->increments('id');
            $table->date('date');
            $table->string('link_zoom');
            $table->string('since_time');
            $table->string('until_time');            
            $table->unsignedInteger('status_id')->unsigned();
            $table->foreign('status_id')->references('id')->on('statuses');
            $table->unsignedInteger('teacher_schedule_id')->unsigned();
            $table->foreign('teacher_schedule_id')->references('id')->on('teacher_schedules');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('teacher_lessons');
    }
}
