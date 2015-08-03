<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVotesTable extends Migration
{

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('votes', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('name');
			$table->string('phone');
			$table->boolean('q1');
			$table->boolean('q2');
			$table->boolean('q3');
			$table->string('note1')->nullable();
			$table->string('note2')->nullable();
			$table->unsignedInteger('photo_id');
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
		Schema::drop('votes');
	}

}
