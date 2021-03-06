<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateActividadesAnexoTresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('actividades_anexo_tres', function (Blueprint $table) {
            $table->integer('codigoPiar');
            $table->string('nombreActividad');
            $table->string('descripcionEstrategia');
            $table->integer('codigoFrecuencia');
        });

        Schema::table('actividades_anexo_tres', function (Blueprint $table) {
            $table->foreign('codigoPiar')->references('codigoPiar')->on('piars');           
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
        Schema::dropIfExists('actividades_anexo_tres');
    }
}
