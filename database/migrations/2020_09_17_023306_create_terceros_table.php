<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTercerosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('terceros', function (Blueprint $table) {
            $table->integer('codigoTercero')->autoIncrement();            
            $table->string('contrasena');
            $table->string('nombreTercero');
            $table->integer('codigoCargo');
            $table->integer('codigoDependencia');
        });

        Schema::table('terceros', function (Blueprint $table) {
            $table->foreign('codigoCargo')->references('codigoCargo')->on('cargos');
            $table->foreign('codigoDependencia')->references('codigoDependencia')->on('dependencias');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('terceros');
    }
}
