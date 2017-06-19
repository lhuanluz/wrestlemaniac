<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRawTeamsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('raw_teams', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users');
            $table->double('team_points');
            $table->double('team_cash');
            $table->integer('superstar01')->unsigned();
            $table->integer('superstar02')->unsigned();
            $table->integer('superstar03')->unsigned();
            $table->integer('superstar04')->unsigned();
            $table->foreign('superstar01')->references('id')->on('superstars');
            $table->foreign('superstar02')->references('id')->on('superstars');
            $table->foreign('superstar03')->references('id')->on('superstars');
            $table->foreign('superstar04')->references('id')->on('superstars');
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
        Schema::dropIfExists('raw_teams');
        $table->foreign('user_id')
      ->references('id')->on('users')
      ->onDelete('cascade');
    }
}
