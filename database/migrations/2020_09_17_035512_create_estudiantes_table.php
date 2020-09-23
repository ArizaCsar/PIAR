<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEstudiantesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('estudiantes', function (Blueprint $table) {
            $table->increments('odigoEstudiante');
            $table->integer('codigoTipoId');
            $table->integer('numeroDocumento');
            $table->string('nombres');
            $table->string('apellidos');
            $table->integer('codigoCiudad');
            $table->timestamp('fechaNacimiento');
            $table->integer('edad');
            $table->integer('codigoDepartamento');
            $table->string('municipioVivienda');
            $table->string('barrioVivienda');
            $table->string('direccionVivienda');
            $table->string('telefonoVivienda');
            $table->string('correoElectronico');
            $table->integer('codigoGrado');
            $table->string('centroProteccion');
            $table->string('descripcionCentroProteccion');
            $table->string('leyVictimas');
            $table->string('codigoGrupoEtnico');
            $table->integer('codigoEntidad');
            $table->string('afiliacionSistemaSalud');
            $table->integer('codigoEps');
            $table->string('afiliacionEps');
            $table->string('atencionActualSalud');
            $table->string('atencionEmergencia');
            $table->string('frecuenciaAtencionSalud');
            $table->string('diagnosticoMedico');
            $table->string('descripcionDiagnostico');
            $table->string('tratamientoMedico');
            $table->string('descripcionTratamiento');
            $table->string('medicamentos');
            $table->string('objetos');
            $table->integer('cantidadHermanos');
            $table->string('lugarOcupa');
            $table->string('bajoProteccion');
            $table->string('recibeSubsidio');
            $table->string('origenSubsidio');
            $table->string('vinculacionEducativa');
            $table->string('razonNegativa');
            $table->string('entidadVinculado');
            $table->string('aproboCurso');
            $table->string('razonCambio');
            $table->string('recibePiar');
            $table->string('institucionRecibe');
            $table->string('programasComplementarios');
            $table->string('medioTransporte');
            $table->integer('codigoDistancia');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('estudiantes');
    }
}
