<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTerapiasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('terapias', function (Blueprint $table) {
            $table->integer('codigoEstudiante');
            $table->string('terapia');
            $table->integer('codigoFrecuencia');
        });

        Schema::table('terapias', function (Blueprint $table) {
            $table->foreign('codigoEstudiante')->references('codigoEstudiante')->on('estudiantes');
            $table->foreign('codigoFrecuencia')->references('codigoFrecuencia')->on('frecuencias');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('terapias');
    }
}
