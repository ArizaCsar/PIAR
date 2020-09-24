<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePiarsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('piars', function (Blueprint $table) {
            $table->integer('codigoPiar')->autoIncrement();
            $table->timestamp('fechaCreacion');
            $table->integer('codigoEstudiante');
            $table->string('nombreDiligente');
            $table->integer('codigoCargo');
        });

        Schema::table('piars', function (Blueprint $table) {
            $table->foreign('codigoEstudiante')->references('codigoEstudiante')->on('estudiantes');
            $table->foreign('codigoCargo')->references('codigoCargo')->on('cargos');
           
        });
    }
    

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('piars');
    }
}
