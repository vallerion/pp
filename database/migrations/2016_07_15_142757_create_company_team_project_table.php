<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCompanyTeamProjectTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('company_team_project', function (Blueprint $table) {
            $table->integer('company_id')->unsigned()->nullable();
            $table->integer('team_id')->unsigned()->nullable();
            $table->integer('project_id')->unsigned()->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('company_team_project');
    }
}
