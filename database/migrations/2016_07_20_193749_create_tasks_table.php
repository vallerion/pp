<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTasksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tasks', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_from_id')->unsigned();
            $table->integer('user_to_id')->unsigned();
            $table->integer('project_id')->unsigned();
            $table->string('name');
            $table->string('about', 2048);
            $table->integer('priority')->unsigned()->default(1);
            $table->integer('status')->unsigned()->default(1); // 1 - open, 2 - reopen, 3 - test, 0 - closed
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
        Schema::drop('tasks');
    }
}
