<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAlbumsTable extends Migration
{

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('albums', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('name');
            $table->string('type');
			$table->string('area');
            $table->string('path')->nullable();
            $table->string('qr')->nullable();
            $table->string('note')->nullable();
            $table->unsignedTinyInteger('column')->default(3);
            $table->unsignedTinyInteger('seq')->default(1);
            $table->boolean('is_display')->default(1);
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
		Schema::drop('albums');
	}

}
