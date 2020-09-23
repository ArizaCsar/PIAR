<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBarriosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('barrios', function (Blueprint $table) {
            $table->string('codigoBarrio')->primary('codigoBarrio');
            $table->string('descripcionBarrio');
            $table->string('codigoCiudad');
        });

        Schema::table('barrios', function (Blueprint $table) {
            $table->foreign('codigoCiudad')->references('codigoCiudad')->on('ciudades');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('barrios');
    }
}
