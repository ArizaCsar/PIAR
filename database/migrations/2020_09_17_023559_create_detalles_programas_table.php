<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetallesProgramasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detalles_programas', function (Blueprint $table) {
            $table->integer('codigoPrograma');            
            $table->integer('codigoMateria');
            $table->integer('codigoTercero');

        });

        Schema::table('detalles_programas', function (Blueprint $table) {
            $table->foreign('codigoPrograma')->references('codigoPrograma')->on('programas');
            $table->foreign('codigoMateria')->references('codigoMateria')->on('materias');
            $table->foreign('codigoTercero')->references('codigoTercero')->on('terceros');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('detalles_programas');
    }
}
