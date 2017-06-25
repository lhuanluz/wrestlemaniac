<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use App\Models\config;

class CreateConfigsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('configs', function (Blueprint $table) {
            $table->increments('id');
            $table ->string('statusMercadoRaw')->default('Fechado');
            $table ->string('statusMercadoSmackdown')->default('Fechado');
            $table->string('ppvBrand')->default('None');
            $table->string('statusMercadoPPV')->default('Fechado');
            $table->timestamps();

        });

        config::create([
            'statusMercadoRaw' => 'Fechado'
        ]);
        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('configs');
    }
}
