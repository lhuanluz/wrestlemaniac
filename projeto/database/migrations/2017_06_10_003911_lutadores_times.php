<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class LutadoresTimes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lutadores_times', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('lutador_id')->unsigned();
            $table->integer('time_id')->unsigned();
            $table->foreign('lutador_id')->references('id')->on('lutadores');
            $table->foreign('time_id')->references('id')->on('times');
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
        Schema::dropIfExists('lutadores_times');
    }
}
