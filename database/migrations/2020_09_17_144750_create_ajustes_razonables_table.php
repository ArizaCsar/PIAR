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
            $table->integer('codigoMeteria');
            $table->string('objetivo');
            $table->string('barrera');
            $table->string('ajuste');
            $table->string('evalucacion');
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
