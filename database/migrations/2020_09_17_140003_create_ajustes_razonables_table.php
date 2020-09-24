<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAjustesRazonablesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ajustes_razonables', function (Blueprint $table) {
            $table->integer('codigoPiar');
            $table->integer('codigoMateria');
            $table->string('objetivo');
            $table->string('barrera');
            $table->string('ajuste');
            $table->string('evalucacion');
        });

        Schema::table('ajustes_razonables', function (Blueprint $table) {
            $table->foreign('codigoPiar')->references('codigoPiar')->on('piars');
            $table->foreign('codigoMateria')->references('codigoMateria')->on('materias');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ajustes_razonables');
    }
}
