<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProgramasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('programas', function (Blueprint $table) {
            $table->integer('codigoPrograma')->autoIncrement();            
            $table->string('descripcionPrograma');
            $table->integer('codigoGrado');
            $table->integer('codigoTiempo');

        });

        Schema::table('programas', function (Blueprint $table) {
            $table->foreign('codigoGrado')->references('codigoGrado')->on('grados');
            $table->foreign('codigoTiempo')->references('codigoTiempo')->on('tiempos');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('programas');
    }
}
