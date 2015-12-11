<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSignupsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('signups', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('photo_id');
            $table->string('identity');
            $table->string('gender');
            $table->string('birth_year');
            $table->string('type');
            $table->string('level');
            $table->string('background');
            $table->string('mobile');
            $table->string('food');
            $table->string('emp_id');
            $table->string('group');
            $table->unsignedInteger('project_id');
            $table->unsignedInteger('course_id');
            $table->unsignedInteger('event_id');
            $table->string('note')->nullable();
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
        Schema::drop('signups');
    }
}
