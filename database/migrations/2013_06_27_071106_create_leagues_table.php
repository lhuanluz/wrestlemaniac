<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use App\Models\league;

class CreateLeaguesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('leagues', function (Blueprint $table) {
            $table->increments('id');
            $table->string('league_name')->unique();
            $table->double('league_points')->default(0.0);
            $table->integer('owner')->default(1);
            $table->integer('member1')->default(2);
            $table->integer('member2')->default(3);
            $table->integer('member3')->default(4);
            $table->integer('member4')->default(5);
            $table->timestamps();
        });

        league::create([
            'league_name' => 'None'
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('leagues');
    }
}
