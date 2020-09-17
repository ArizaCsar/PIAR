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
            $table->codigoEstudiante();
            $table->codigoTipoId();
            $table->numeroDocumento();
            $table->string('nombres');
            $table->string('apellidos');
            $table->codigoCiudad();
            $table->timestamp('fechaNacimiento');
            $table->edad();
            $table->codigoDepartamento();
            $table->string('municipioVivienda');
            $table->string('barrioVivienda');
            $table->string('direccionVivienda');
            $table->string('telefonoVivienda');
            $table->string('correoElectronico');
            $table->codigoGrado();
            $table->string('centroProteccion');
            $table->string('descripcionCentroProteccion');
            $table->string('leyVictimas');
            $table->string('codigoGrupoEtnico');
            $table->registroLeyVictimas();
            $table->string('afiliacionSistemaSalud');
            $table->codigoEps();
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
            $table->cantidadHermanos();
            $table->string('lugarOcupa');
            $table->string('bajoProteccion');
            $table->string('recibeSubsidio');
            $table->string('origenSubsidio');
            $table->string('vinculacionEducativa');
            $table->string('razonNegativa');
            $table->string('entidadVinculado');
            $table->codigoGrado();
            $table->string('aproboCurso');
            $table->string('razonCambio');
            $table->string('recibePiar');
            $table->string('institucionRecibe');
            $table->string('programasComplementarios');
            $table->string('medioTransporte');
            $table->codigoDistancia();
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
