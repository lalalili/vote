<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNewEmployeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('new_employees', function (Blueprint $table) {
            $table->string('identity');
            $table->primary('identity');
            $table->string('area')->nullable();
            $table->string('type')->nullable();
            $table->string('location')->nullable();
            $table->string('title')->nullable();
            $table->string('emp_id')->nullable();
            $table->string('name')->nullable();
            $table->string('gender')->nullable();
            $table->unsignedSmallInteger('birth_year')->nullable();
            $table->string('level')->nullable();
            $table->string('background')->nullable();
            $table->string('mobile')->nullable();
            $table->string('food')->nullable();
            $table->string('group')->nullable();
            $table->unsignedInteger('tax_id')->nullable();
            $table->date('duty_date')->nullable();
            $table->string('note1')->nullable();
            $table->string('note2')->nullable();
            $table->string('note3')->nullable();
            $table->string('note4')->nullable();
            $table->string('note5')->nullable();
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
        Schema::drop('new_employees');
    }
}
