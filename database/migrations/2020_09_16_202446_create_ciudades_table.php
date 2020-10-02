<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCiudadesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ciudades', function (Blueprint $table) {
            $table->string('codigoCiudad');
            $table->string('descripcionCiudad');
            $table->string('codigoDepartamento');
        });

        Schema::table('ciudades', function (Blueprint $table) {
            $table->primary(["codigoCiudad", "codigoDepartamento"]);
            $table->foreign('codigoDepartamento')->references('codigoDepartamento')->on('departamentos');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ciudades');
    }
}
