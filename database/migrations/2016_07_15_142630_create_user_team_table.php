<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserTeamTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_team', function (Blueprint $table) {
            $table->integer('user_id')->unsigned()->index();
            $table->integer('team_id')->unsigned()->index();
            $table->integer('role_id')->unsigned()->index();

            $table->unique([ 'user_id', 'team_id' ]);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('user_team');
    }
}
