<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVinculosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vinculos', function (Blueprint $table) {
            $table->increments('codigoEstudiante');
            $table->string('parentezco');
            $table->string('nombres');
            $table->string('apellidos');
            $table->integer('codigoOcupacion');
            $table->integer('codigoGrado');
            $table->integer('telefono');
            $table->string('correoElectronico');
            $table->string('apoyoCrianza');
            $table->string('vivenJuntos');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('vinculos');
    }
}
