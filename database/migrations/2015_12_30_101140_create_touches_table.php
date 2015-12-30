<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Schema;

class CreateTouchesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('touches', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->nullable();
            $table->string('filename')->nullable();
            $table->string('utf8_filename')->nullable();
            $table->unsignedTinyInteger('seq')->default(1);
            $table->string('path')->nullable();
            $table->boolean('is_display')->default(1);
            $table->unsignedInteger('photo_id')->nullable();
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
        Schema::drop('touches');
    }
}
