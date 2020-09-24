<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProgramasComplementariosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('programas_complementarios', function (Blueprint $table) {
            $table->integer('codigoEstudiante');
            $table->string('programa');
        });

        Schema::table('programas_complementarios', function (Blueprint $table) {
            $table->foreign('codigoEstudiante')->references('codigoEstudiante')->on('estudiantes');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('programas__complementarios');
    }
}
