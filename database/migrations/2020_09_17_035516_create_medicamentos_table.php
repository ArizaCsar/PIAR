<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMedicamentosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('medicamentos', function (Blueprint $table) {
            $table->integer('codigoEstudiante');
            $table->string('medicamento');
            $table->integer('codigoFrecuencia');
        });

        Schema::table('medicamentos', function (Blueprint $table) {
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
        Schema::dropIfExists('medicamentos');
    }
}
