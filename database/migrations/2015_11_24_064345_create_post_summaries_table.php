<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostSummariesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('post_summaries', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('album_id');
            $table->string('album_name');
            $table->unsignedInteger('photo_id');
            $table->string('photo_name');
            $table->unsignedInteger('count');
            $table->unsignedInteger('rank')->nullable();
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
        Schema::drop('post_summaries');
    }
}
