<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Schema;


class CreatePhotosTable extends Migration
{

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('photos', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('name');
			$table->string('filename');
			$table->string('utf8_filename');
			$table->unsignedTinyInteger('seq')->default(1);
			$table->string('path');
			$table->boolean('is_display')->default(1);
			$table->unsignedInteger('album_id');
			$table->unsignedInteger('title_id');
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
		Schema::drop('photos');
	}

}
