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
            $table->string('descripcionEntrategia');
            $table->string('frecuencia');
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
