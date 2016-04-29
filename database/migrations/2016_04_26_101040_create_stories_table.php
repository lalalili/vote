<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateStoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stories', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedSmallInteger('type');
            $table->string('title1', 10)->nullable();
            $table->string('title2', 10)->nullable();
            $table->string('title3', 10)->nullable();
            $table->string('slogn', 30)->nullable();
            $table->string('store', 10)->nullable();
            $table->string('employee1', 10)->nullable();
            $table->string('employee2', 10)->nullable();
            $table->string('employee3', 10)->nullable();
            $table->string('employee4', 10)->nullable();
            $table->string('employee5', 10)->nullable();
            $table->string('customer', 10)->nullable();
            $table->date('date')->nullable();
            $table->string('story1', 500)->nullable();
            $table->string('story2', 500)->nullable();
            $table->string('story3', 500)->nullable();
            $table->string('story4', 500)->nullable();
            $table->string('story5', 500)->nullable();
            $table->string('story6', 500)->nullable();
            $table->string('story7', 500)->nullable();
            $table->string('story8', 500)->nullable();
            $table->string('story9', 500)->nullable();
            $table->string('story10', 500)->nullable();
            $table->string('thinking', 50)->nullable();
            $table->string('touching', 50)->nullable();
            $table->string('treating', 50)->nullable();
            $table->string('timing', 50)->nullable();
            $table->string('summary', 100)->nullable();
            $table->string('pic1', 50)->nullable();
            $table->string('pic2', 50)->nullable();
            $table->string('pic3', 50)->nullable();
            $table->string('pic4', 50)->nullable();
            $table->string('pic5', 50)->nullable();
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
        Schema::drop('stories');
    }
}
