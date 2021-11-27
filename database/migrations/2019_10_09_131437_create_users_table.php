<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('rut');
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password');
            $table->integer('phone');
            $table->string('address');
            $table->string('birthdate');     
            $table->string('genere');           
            $table->unsignedInteger('profile_id')->unsigned();
            $table->foreign('profile_id')->references('id')->on('profiles');
            $table->unsignedInteger('commune_id')->unsigned();
            $table->foreign('commune_id')->references('id')->on('communes');
            $table->unsignedInteger('region_id')->unsigned();
            $table->foreign('region_id')->references('id')->on('regions');
            $table->unsignedInteger('country_id')->unsigned();
            $table->foreign('country_id')->references('id')->on('countries');
            $table->unsignedInteger('attorney_id')->index()->nullable()->unsigned();
            $table->foreign('attorney_id')->references('id')->on('users');
            $table->rememberToken();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
