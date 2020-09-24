<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAnexoTresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('anexo_tres', function (Blueprint $table) {
            $table->integer('codigoPiar');
            $table->timestamp('fechaCreacion');
            $table->string('compromisos');
            
        });

        Schema::table('anexo_tres', function (Blueprint $table) {
            $table->foreign('codigoPiar')->references('codigoPiar')->on('piars');           
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('anexo_tres');
    }
}
