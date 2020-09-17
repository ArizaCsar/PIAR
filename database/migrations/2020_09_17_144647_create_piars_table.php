<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePiarsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('piars', function (Blueprint $table) {
            $table->increments('codigoPiar');
            $table->timestamp('fechaCreacion');
            $table->integer('codigoEstudiante');
            $table->string('nombreDiligente');
            $table->integer('codigoCargo');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('piars');
    }
}
