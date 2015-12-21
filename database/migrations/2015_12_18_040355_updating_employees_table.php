<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdatingEmployeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('employees', function (Blueprint $table) {
            $table->string('identity')->nullable()->change();
            $table->string('gender')->nullable()->change();
            $table->string('birth_year')->nullable()->change();
            $table->string('type')->nullable()->change();
            $table->string('level')->nullable()->change();
            $table->string('background')->nullable()->change();
            $table->string('mobile')->nullable()->change();
            $table->string('food')->nullable()->change();
            $table->string('emp_id')->nullable()->change();
            $table->string('group')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('employees', function (Blueprint $table) {
            $table->string('identity')->change();
            $table->string('gender')->change();
            $table->string('birth_year')->change();
            $table->string('type')->change();
            $table->string('level')->change();
            $table->string('background')->change();
            $table->string('mobile')->change();
            $table->string('food')->change();
            $table->string('emp_id')->change();
            $table->string('group')->change();
        });
    }
}
