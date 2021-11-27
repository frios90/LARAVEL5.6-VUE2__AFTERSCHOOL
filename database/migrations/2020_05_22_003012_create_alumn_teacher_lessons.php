<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAlumnTeacherLessons extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('alumn_teacher_lessons', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->unsignedInteger('teacher_lesson_id')->unsigned();
            $table->foreign('teacher_lesson_id')->references('id')->on('teacher_lessons');
            $table->unsignedInteger('alumn_id')->unsigned();
            $table->foreign('alumn_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('alumn_teacher_lessons');
    }
}
