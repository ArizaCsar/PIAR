<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRecomendacionesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('recomendaciones', function (Blueprint $table) {
            $table->integer('codigoPiar');
            $table->integer('codigoActor');
            $table->string('accion');
            $table->string('estrategia');
        });

        Schema::table('recomendaciones', function (Blueprint $table) {
            $table->foreign('codigoPiar')->references('codigoPiar')->on('piars');           
            $table->foreign('codigoActor')->references('codigoActor')->on('actores');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('recomendaciones');
    }
}
