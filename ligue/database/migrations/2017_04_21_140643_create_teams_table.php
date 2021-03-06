<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTeamsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('teams', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('localisation');
            $table->integer('admin_id');
            $table->integer('league_id');
            $table->timestamps();
        });

            Schema::create('Player_Team', function (Blueprint $table) {
            $table->integer('player_id');
            $table->integer('team_id');
            $table->Primary(['player_id', 'team_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('teams');
        Schema::dropIfExists('Player_Team');
    }
}
