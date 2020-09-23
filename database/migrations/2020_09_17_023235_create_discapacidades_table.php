<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDiscapacidadesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('discapacidades', function (Blueprint $table) {
            $table->increments('codigoDiscapacidad');
            $table->string('descripcionDiscapacidad');
            $table->integer('codigoTipoDiscapacidad');

        });

        Schema::table('discapacidades', function (Blueprint $table) {
            $table->foreign('codigoTipoDiscapacidad')->references('codigoTipoDiscapacidad')->on('tipos_discapacidades');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('discapacidades');
    }
}
