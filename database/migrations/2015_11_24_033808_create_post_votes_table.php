<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostVotesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('post_votes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('phone');
            $table->boolean('q1')->default(0)->nullable();
            $table->boolean('q2')->default(0)->nullable();
            $table->boolean('q3')->default(0)->nullable();
            $table->string('note1')->nullable();
            $table->string('note2')->nullable();
            $table->unsignedInteger('photo_id');
            $table->dateTime('created_at');
            $table->index(['account_id', 'created_at']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('post_votes');
    }
}
