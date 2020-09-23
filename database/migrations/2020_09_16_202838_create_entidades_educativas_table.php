<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEntidadesEducativasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('entidades_educativas', function (Blueprint $table) {
            $table->increments('codigoEntidad');
            $table->string('nombreEntidad');
            $table->string('principal');
            $table->integer('codigoSede');
            $table->integer('codigoJornada');
        });

        Schema::table('entidades_educativas', function (Blueprint $table) {
            $table->foreign('codigoSede')->references('codigoSede')->on('sedes');
            $table->foreign('codigoJornada')->references('codigoJornada')->on('jornadas');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('entidades_educativas');
    }
}
