<?php

use Illuminate\Http\Request;
use App\DTO\Login;
use App\Http\Controllers\Login as LoginController;
use App\Paises;
use App\Departamentos;
use App\Ciudades;
use App\Tipos_Identificacion as TiposId;
use App\Grupos_Etnicos;
use App\TiposDiscapacidades;
use App\Discapacidades;
use App\Ocupaciones;
use App\Materias;
use App\TiposTelefonos;
use App\Eps;
use App\Parentescos;
use App\Frecuencias;
use App\Distancias;
use App\EntidadesEducativas;
use App\Jornadas;
use App\Cargos;
use App\Grados;
use App\Dependencias;
use App\Sedes;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
Route::post('login',[LoginController::class, 'doLogin'], function () {});

/********************************************************
 *                      Rutas pais                      *
 ********************************************************
 */

 // Obtiene todos los paises de base de datos
 Route::get('paises', function() { return Paises::all(); });

 // Obtiene el país con el código obtenido por url de base de datos
 Route::get('pais/{codigoPais}', function($codigoPais) {
    return Paises::where('codigoPais', $codigoPais)->firstOrFail();
});

// Almacena el país obtenido de la petición en base de datos
Route::post('pais', function (Request $request) {
    try {
        $pais = new Paises();
        $pais->codigoPais = $request->codigoPais;
        $pais->descripcionPais = $request->descripcionPais;
        $pais->save();
    } catch (\Throwable $th) {
        return response()->json(["message" => 'Error al crear el país ' . $request->descripcionPais, "status" => 400, "trace" => $th], 400);
    }
});

// Actualiza la descripción del país en base de datos
Route::put('pais/{codigoPais}', function($codigoPais, Request $request) {
    try {
        $pais = Paises::where('codigoPais', $codigoPais)->firstOrFail();
        $pais->descripcionPais = $request->descripcionPais;
        $pais->save();
        return true;
    } catch (\Throwable $th) {
        return response()->json(["message" => 'Error al actualizar el país con código ' . $codigoPais, "status" => 400, "trace" => $th], 400);
    }
});

// Elimina el país con el código obtenido por url
Route::delete('pais/{codigoPais}', function($codigoPais) {
    try {
        return Paises::where('codigoPais', $codigoPais)->delete();
    } catch (\Throwable $th) {
        return response()->json(["message" => 'Error al eliminar el país porque comparte información con algunos departamentos', "status" => 400, "trace" => $th], 400);
    }
});

/********************************************************
 *                      Rutas departamentos             *
 *******************************************************/

 // Obtiene todos los departamentos de base de datos
 Route::get('departamentos', function() { 
     return Departamentos::with('pais')
        ->orderBy('codigoPais')
        ->orderBy('codigoDepartamento')
        ->get();
    });

 // Obtiene el departamento con el código obtenido por url de base de datos
 Route::get('departamento/{codigoDepartamento}', function($codigoDepartamento) {
    return Departamentos::where('codigoDepartamento', $codigoDepartamento)->firstOrFail();
});

// Almacena el departamento obtenido de la petición en base de datos
Route::post('departamento', function (Request $request) {
    try {
        $departamento = new Departamentos();
        $departamento->codigoDepartamento = $request->codigoDepartamento;
        $departamento->descripcionDepartamento = $request->descripcionDepartamento;
        $departamento->save();
    } catch (\Throwable $th) {
        return response()->json(["message" => 'Error al crear el departamento ' . $request->descripcionDepartamento, "status" => 400, "trace" => $th], 400);
    }
});

// Actualiza la descripción del departamento en base de datos
Route::put('departamento/{codigoDepartamento}', function($codigoDepartamento, Request $request) {
    try {
        $departamento = Departamentos::where('codigoDepartamento', $codigoDepartamento)->firstOrFail();
        $departamento->descripcionDepartamento = $request->descripcionDepartamento;
        $departamento->save();
        return true;
    } catch (\Throwable $th) {
        return response()->json(["message" => 'Error al actualizar el departamento con código ' . $codigoDepartamento, "status" => 400, "trace" => $th], 400);
    }
});

// Elimina el país con el código obtenido por url
Route::delete('departamento/{codigoDepartamento}', function($codigoDepartamento) {
    try {
        return Departamentos::where('codigoDepartamento', $codigoDepartamento)->delete();
    } catch (\Throwable $th) {
        return response()->json(["message" => 'Error al eliminar el departamento porque comparte información con algunos departamentos', "status" => 400, "trace" => $th], 400);
    }
});


/********************************************************
 *                      Rutas ciudades                  *
 *******************************************************/

 // Obtiene todos los paises de base de datos
 Route::get('ciudades', function() {
     return Ciudades::with('departamento')
                ->orderBy('codigoDepartamento')
                ->orderBy('codigoCiudad')
                ->get();
    });

 // Obtiene el país con el código obtenido por url de base de datos
 Route::get('ciudad/{codigoCiudad}', function($codigoCiudad) {
    return Ciudades::where('codigoCiudad', $codigoCiudad)->firstOrFail();
});

// Almacena el país obtenido de la petición en base de datos
Route::post('ciudad', function (Request $request) {
    try {
        $ciudad = new Ciudades();
        $ciudad->codigoCiudad = $request->codigoCiudad;
        $ciudad->descripcionCiudad = $request->descripcionCiudad;
        $ciudad->save();
    } catch (\Throwable $th) {
        return response()->json(["message" => 'Error al crear la ciudad ' . $request->descripcionCiudad, "status" => 400, "trace" => $th], 400);
    }
});

// Actualiza la descripción del país en base de datos
Route::put('ciudad/{codigoCiudad}', function($codigoCiudad, Request $request) {
    try {
        $ciudad = Ciudades::where('codigoCiudad', $codigoCiudad)->firstOrFail();
        $ciudad->descripcionCiudad = $request->descripcionCiudad;
        $ciudad->save();
        return true;
    } catch (\Throwable $th) {
        return response()->json(["message" => 'Error al actualizar la ciudad con código ' . $codigoCiudad, "status" => 400, "trace" => $th], 400);
    }
});

// Elimina el país con el código obtenido por url
Route::delete('ciudad/{codigoCiudad}', function($codigoCiudad) {
    try {
        return Ciudades::where('codigoCiudad', $codigoCiudad)->delete();
    } catch (\Throwable $th) {
        return response()->json(["message" => 'Error al eliminar la ciudad porque comparte información con algunos departamentos', "status" => 400, "trace" => $th], 400);
    }
});

/********************************************************
 *           Rutas Tipos de Identificacion             *
 *******************************************************/

 // Obtiene todos los departamentos de base de datos
 Route::get('tiposId', function() { return TiposId::all(); });

 // Obtiene el departamento con el código obtenido por url de base de datos
 Route::get('tipoId/{codigoTipoId}', function($codigoTipoId) {
    return TiposId::where('codigoTipoId', $codigoTipoId)->firstOrFail();
});

// Almacena el tipo de identificacion obtenido de la petición en base de datos
Route::post('tipoId', function (Request $request) {
    try {
        $tipoId = new TiposId();
        $tipoId->codigoTipoId = $request->codigoTipoId;
        $tipoId->descripcionTipoId = $request->descripcionTipoId;
        $tipoId->save();
    } catch (\Throwable $th) {
        return response()->json(["message" => 'Error al crear el tipo de identificacion ' . $request->descripcionDepartamento, "status" => 400, "trace" => $th], 400);
    }
});

// Actualiza la descripción del tipo de identificacion en base de datos
Route::put('tipoId/{codigoTipoId}', function($codigoTipoId, Request $request) {
    try {
        $tipoId = TiposId::where('codigoTipoId', $codigoTipoId)->firstOrFail();
        $tipoId->descripcionTipoId = $request->descripcionTipoId;
        $tipoId->save();
        return true;
    } catch (\Throwable $th) {
        return response()->json(["message" => 'Error al actualizar el tipo de identificacion ' . $codigoTipoId, "status" => 400, "trace" => $th], 400);
    }
});

// Elimina el tipo de identificacion con el código obtenido por url
Route::delete('tipoId/{codigoTipoId}', function($codigoTipoId) {
    try {
        return TiposId::where('codigoTipoId', $codigoTipoId)->delete();
    } catch (\Throwable $th) {
        return response()->json(["message" => 'Error al eliminar el tipo de identificacion porque comparte información con algunos departamentos', "status" => 400, "trace" => $th], 400);
    }
});

/********************************************************
 *                 Rutas Grupos Etnicos                 *
 ********************************************************
 */

 // Obtiene todos los grupos etnicos de base de datos
 Route::get('gruposEtnicos', function() { return Grupos_Etnicos::all(); });

 // Obtiene el grupo etnico con el código obtenido por url de base de datos
 Route::get('grupoEtnico/{codigoGrupoEtnico}', function($codigoGrupoEtnico) {
    return Grupos_Etnicos::where('codigoGrupoEtnico', $codigoGrupoEtnico)->firstOrFail();
});

// Almacena el grupo etnico obtenido de la petición en base de datos
Route::post('grupoEtnico', function (Request $request) {
    try {
        $grupoEtnico = new Grupos_Etnicos();
        $grupoEtnico->codigoGrupoEtnico = $request->codigoGrupoEtnico;
        $grupoEtnico->descripcionGrupoEtnico = $request->descripcionGrupoEtnico;
        $grupoEtnico->save();
    } catch (\Throwable $th) {
        return response()->json(["message" => 'Error al crear el grupo étnico ' . $request->descripcionGrupoEtnico, "status" => 400, "trace" => $th], 400);
    }
});

// Actualiza la descripción del grupo etnico en base de datos
Route::put('grupoEtnico/{codigoGrupoEtnico}', function($codigoGrupoEtnico, Request $request) {
    try {
        $grupoEtnico = Grupos_Etnicos::where('codigoGrupoEtnico', $codigoGrupoEtnico)->firstOrFail();
        $grupoEtnico->descripcionGrupoEtnico = $request->descripcionGrupoEtnico;
        $grupoEtnico->save();
        return true;
    } catch (\Throwable $th) {
        return response()->json(["message" => 'Error al actualizar el grupo étnico con código ' . $codigoGrupoEtnico, "status" => 400, "trace" => $th], 400);
    }
});

// Elimina el grupo etnico con el código obtenido por url
Route::delete('grupoEtnico/{codigoGrupoEtnico}', function($codigoGrupoEtnico) {
    try {
        return Grupos_Etnicos::where('codigoGrupoEtnico', $codigoGrupoEtnico)->delete();
    } catch (\Throwable $th) {
        return response()->json(["message" => 'Error al eliminar el grupo étnico porque comparte información', "status" => 400, "trace" => $th], 400);
    }
});

/********************************************************
 *              Rutas Tipos Discapacidades              *
 ********************************************************
 */

 // Obtiene todos los tipos de discapacidades de base de datos
 Route::get('tiposDiscapacidades', function() { return TiposDiscapacidades::all(); });

 // Obtiene el tipo de discapacidad con el código obtenido por url de base de datos
 Route::get('tipoDiscapacidad/{codigoTipoDiscapacidad}', function($codigoTipoDiscapacidad) {
    return TiposDiscapacidades::where('codigoTipoDiscapacidad', $codigoTipoDiscapacidad)->firstOrFail();
});

// Almacena el tipo de discapacidad obtenido de la petición en base de datos
Route::post('tipoDiscapacidad', function (Request $request) {
    try {
        $tipoDiscapacidad = new TiposDiscapacidades();
        $tipoDiscapacidad->codigoTipoDiscapacidad = $request->codigoTipoDiscapacidad;
        $tipoDiscapacidad->descripcionTipoDiscapacidad = $request->descripcionTipoDiscapacidad;
        $tipoDiscapacidad->save();
    } catch (\Throwable $th) {
        return response()->json(["message" => 'Error al crear el tipo de discapacidad' . $request->descripcionTipoDiscapacidad, "status" => 400, "trace" => $th], 400);
    }
});

// Actualiza la descripción del tipo de discapacidad en base de datos
Route::put('tipoDiscapacidad/{codigoTipoDiscapacidad}', function($codigoTipoDiscapacidad, Request $request) {
    try {
        $tipoDiscapacidad = TiposDiscapacidades::where('codigoTipoDiscapacidad', $codigoTipoDiscapacidad)->firstOrFail();
        $tipoDiscapacidad->descripcionTipoDiscapacidad = $request->descripcionTipoDiscapacidad;
        $tipoDiscapacidad->save();
        return true;
    } catch (\Throwable $th) {
        return response()->json(["message" => 'Error al actualizar el tipo de discapacidad con código ' . $codigoTipoDiscapacidad, "status" => 400, "trace" => $th], 400);
    }
});

// Elimina el tipo de discapacidad con el código obtenido por url
Route::delete('tipoDiscapacidad/{codigoTipoDiscapacidad}', function($codigoTipoDiscapacidad) {
    try {
        return TiposDiscapacidades::where('codigoTipoDiscapacidad', $codigoTipoDiscapacidad)->delete();
    } catch (\Throwable $th) {
        return response()->json(["message" => 'Error al eliminar el tipo de discapacidad porque comparte información con otro componente', "status" => 400, "trace" => $th], 400);
    }
});

/********************************************************
 *                  Rutas Discapacidades                *
 ********************************************************
 */

 // Obtiene todas las discapacidades de base de datos
 Route::get('discapacidades', function() { return Discapacidades::all(); });

 // Obtiene la discapacidad con el código obtenida por url de base de datos
 Route::get('discapacidad/{codigoDiscapacidad}', function($codigoDiscapacidad) {
    return Discapacidades::where('codigoDiscapacidad', $codigoDiscapacidad)->firstOrFail();
});

// Almacena la discapacidad obtenida de la petición en base de datos
Route::post('discapacidad', function (Request $request) {
    try {
        $discapacidad = new Discapacidades();
        $discapacidad->codigoDiscapacidad = $request->codigoDiscapacidad;
        $discapacidad->descripcionDiscapacidad = $request->descripcionDiscapacidad;
        $discapacidad->save();
    } catch (\Throwable $th) {
        return response()->json(["message" => 'Error al crear la discapacidad' . $request->descripcionDiscapacidad, "status" => 400, "trace" => $th], 400);
    }
});

// Actualiza la descripción de la discapacidad en base de datos
Route::put('discapacidad/{codigoDiscapacidad}', function($codigoDiscapacidad, Request $request) {
    try {
        $discapacidad = Discapacidades::where('codigoDiscapacidad', $codigoDiscapacidad)->firstOrFail();
        $discapacidad->descripcionDiscapacidad = $request->descripcionDiscapacidad;
        $discapacidad->save();
        return true;
    } catch (\Throwable $th) {
        return response()->json(["message" => 'Error al actualizar la discapacidad con código ' . $codigoDiscapacidad, "status" => 400, "trace" => $th], 400);
    }
});

// Elimina la discapacidad con el código obtenido por url
Route::delete('discapacidad/{codigoDiscapacidad}', function($codigoDiscapacidad) {
    try {
        return Discapacidades::where('codigoDiscapacidad', $codigoDiscapacidad)->delete();
    } catch (\Throwable $th) {
        return response()->json(["message" => 'Error al eliminar la discapacidad porque comparte información con otro componente', "status" => 400, "trace" => $th], 400);
    }
});

/********************************************************
 *                   Rutas Ocupaciones                  *
 ********************************************************
 */

 // Obtiene todas las ocupaciones de base de datos
 Route::get('ocupaciones', function() { return Ocupaciones::all(); });

 // Obtiene la ocupacion con el código obtenida por url de base de datos
 Route::get('ocupacion/{codigoOcupacion}', function($codigoOcupacion) {
    return Ocupaciones::where('codigoOcupacion', $codigoOcupacion)->firstOrFail();
});

// Almacena la discapacidad obtenida de la petición en base de datos
Route::post('ocupacion', function (Request $request) {
    try {
        $ocupacion = new Ocupaciones();
        $ocupacion->codigoOcupacion = $request->codigoOcupacion;
        $ocupacion->descripcionOcupacion = $request->descripcionOcupacion;
        $ocupacion->save();
    } catch (\Throwable $th) {
        return response()->json(["message" => 'Error al crear la ocupacion' . $request->descripcionOcupacion, "status" => 400, "trace" => $th], 400);
    }
});

// Actualiza la ocupacion de la discapacidad en base de datos
Route::put('ocupacion/{codigoDiscapacidad}', function($codigoDiscapacidad, Request $request) {
    try {
        $ocupacion = Ocupaciones::where('codigoOcupacion', $codigoOcupacion)->firstOrFail();
        $ocupacion->descripcionOcupacion = $request->descripcionOcupacion;
        $ocupacion->save();
        return true;
    } catch (\Throwable $th) {
        return response()->json(["message" => 'Error al actualizar la ocupacion con código ' . $codigoOcupacion, "status" => 400, "trace" => $th], 400);
    }
});

// Elimina la ocupacion con el código obtenido por url
Route::delete('ocupacion/{codigoOcupacion}', function($codigoOcupacion) {
    try {
        return Ocupaciones::where('codigoOcupacion', $codigoOcupacion)->delete();
    } catch (\Throwable $th) {
        return response()->json(["message" => 'Error al eliminar la ocupacion porque comparte información con otro componente', "status" => 400, "trace" => $th], 400);
    }
});


/********************************************************
 *                    Rutas Materias                    *
 ********************************************************
 */

 // Obtiene todas las materias de base de datos
 Route::get('materias', function() { return Materias::all(); });

 // Obtiene la materia con el código obtenida por url de base de datos
 Route::get('materia/{codigoMateria}', function($codigoMateria) {
    return Materias::where('codigoMateria', $codigoMateria)->firstOrFail();
});

// Almacena la materia obtenida de la petición en base de datos
Route::post('materia', function (Request $request) {
    try {
        $materia = new Materias();
        $materia->codigoMateria = $request->codigoMateria;
        $materia->descripcionMateria = $request->descripcionMateria;
        $materia->save();
    } catch (\Throwable $th) {
        return response()->json(["message" => 'Error al crear la materia' . $request->descripcionMateria, "status" => 400, "trace" => $th], 400);
    }
});

// Actualiza la materia en base de datos
Route::put('materia/{codigoMateria}', function($codigoMateria, Request $request) {
    try {
        $materia = Materias::where('codigoMateria', $codigoMateria)->firstOrFail();
        $materia->descripcionMateria = $request->descripcionMateria;
        $materia->save();
        return true;
    } catch (\Throwable $th) {
        return response()->json(["message" => 'Error al actualizar la materia con código ' . $codigoMateria, "status" => 400, "trace" => $th], 400);
    }
});

// Elimina la materia con el código obtenido por url
Route::delete('materia/{codigoMateria}', function($codigoMateria) {
    try {
        return Materias::where('codigoMateria', $codigoMateria)->delete();
    } catch (\Throwable $th) {
        return response()->json(["message" => 'Error al eliminar la materia porque comparte información con otro componente', "status" => 400, "trace" => $th], 400);
    }
});

/********************************************************
 *              Rutas Tipos de telefonos                *
 ********************************************************
 */

 // Obtiene todos los tipos de telefonos de base de datos
 Route::get('tiposTelefonos', function() { return TiposTelefonos::all(); });

 // Obtiene la materia con el código obtenida por url de base de datos
 Route::get('tipoTelefono/{codigoTipoTelefono}', function($codigoTipoTelefono) {
    return TiposTelefonos::where('codigoTipoTelefono', $codigoTipoTelefono)->firstOrFail();
});

// Almacena el tipo de telefono obtenido de la petición en base de datos
Route::post('tipoTelefono', function (Request $request) {
    try {
        $tipoTelefono = new TiposTelefonos();
        $tipoTelefono->codigoTipoTelefono = $request->codigoTipoTelefono;
        $tipoTelefono->descripcionTipoTelefono = $request->descripcionTipoTelefono;
        $tipoTelefono->save();
    } catch (\Throwable $th) {
        return response()->json(["message" => 'Error al crear el tipo de telefono' . $request->descripcionTipoTelefono, "status" => 400, "trace" => $th], 400);
    }
});

// Actualiza el tipo de telefono en base de datos
Route::put('tipoTelefono/{codigoMateria}', function($codigoTipoTelefono, Request $request) {
    try {
        $tipoTelefono = TiposTelefonos::where('codigoTipoTelefono', $codigoTipoTelefono)->firstOrFail();
        $tipoTelefono->descripcionTipoTelefono = $request->descripcionTipoTelefono;
        $tipoTelefono->save();
        return true;
    } catch (\Throwable $th) {
        return response()->json(["message" => 'Error al actualizar el tipo de telefono con código ' . $codigoTipoTelefono, "status" => 400, "trace" => $th], 400);
    }
});

// Elimina el tipo de telefono con el código obtenido por url
Route::delete('tipoTelefono/{codigoTipoTelefono}', function($codigoTipoTelefono) {
    try {
        return TiposTelefonos::where('codigoTipoTelefono', $codigoTipoTelefono)->delete();
    } catch (\Throwable $th) {
        return response()->json(["message" => 'Error al eliminar el tipo de telefono porque comparte información con otro componente', "status" => 400, "trace" => $th], 400);
    }
});

/********************************************************
 *                       Rutas EPS                      *
 ********************************************************
 */

 // Obtiene todas las EPS de base de datos
 Route::get('eps', function() { return EPS::all(); });

 // Obtiene la EPS con el código obtenida por url de base de datos
 Route::get('eps/{codigoEps}', function($codigoEps) {
    return EPS::where('codigoEps', $codigoEps)->firstOrFail();
});

// Almacena la EPS obtenida de la petición en base de datos
Route::post('eps', function (Request $request) {
    try {
        $eps = new EPS();
        $eps->codigoEps = $request->codigoEps;
        $eps->descripcionEps = $request->descripcionEps;
        $eps->save();
    } catch (\Throwable $th) {
        return response()->json(["message" => 'Error al crear el tipo de telefono' . $request->descripcionEps, "status" => 400, "trace" => $th], 400);
    }
});

// Actualiza la EPS en base de datos
Route::put('eps/{codigoEps}', function($codigoEps, Request $request) {
    try {
        $eps = EPS::where('codigoEps', $codigoEps)->firstOrFail();
        $eps->descripcionEps = $request->descripcionEps;
        $eps->save();
        return true;
    } catch (\Throwable $th) {
        return response()->json(["message" => 'Error al actualizar el tipo de telefono con código ' . $codigoEps, "status" => 400, "trace" => $th], 400);
    }
});

// Elimina la EPS con el código obtenido por url
Route::delete('eps/{codigoEps}', function($codigoEps) {
    try {
        return Eps::where('codigoEps', $codigoEps)->delete();
    } catch (\Throwable $th) {
        return response()->json(["message" => 'Error al eliminar la EPS porque comparte información con otro componente', "status" => 400, "trace" => $th], 400);
    }
});

/********************************************************
 *                  Rutas Parentesco                    *
 ********************************************************
 */

  // Obtiene todos los parentescos de base de datos
  Route::get('parentescos', function() { return Parentescos::all(); });

  // Obtiene el parentesco con el código obtenido por url de base de datos
  Route::get('parentesco/{codigoParentesco}', function($codigoParentesco) {
     return Parentescos::where('codigoParentesco', $codigoParentesco)->firstOrFail();
 });
 
 // Almacena el parentesco obtenido de la petición en base de datos
 Route::post('parentesco', function (Request $request) {
     try {
         $parentesco = new Parentescos();
         $parentesco->codigoParentesco = $request->codigoParentesco;
         $parentesco->descripcionParentesco = $request->descripcionParentesco;
         $parentesco->save();
     } catch (\Throwable $th) {
         return response()->json(["message" => 'Error al crear el parentesco ' . $request->descripcionParentesco, "status" => 400, "trace" => $th], 400);
     }
 });
 
 // Actualiza la descripción del parentesco en base de datos
 Route::put('parentesco/{codigoParentesco}', function($codigoParentesco, Request $request) {
     try {
         $parentesco = Paises::where('codigoPais', $codigoParentesco)->firstOrFail();
         $parentesco->descripcionParentesco = $request->descripcionParentesco;
         $parentesco->save();
         return true;
     } catch (\Throwable $th) {
         return response()->json(["message" => 'Error al actualizar el parentesco con código ' . $codigoParentesco, "status" => 400, "trace" => $th], 400);
     }
 });
 
 // Elimina el parentesco con el código obtenido por url
 Route::delete('parentesco/{codigoParentesco}', function($codigoParentesco) {
     try {
         return Parentescos::where('codigoParentesco', $codigoParentesco)->delete();
     } catch (\Throwable $th) {
         return response()->json(["message" => 'Error al eliminar el parentesco porque comparte información con algunos componentes', "status" => 400, "trace" => $th], 400);
     }
 });
 
/********************************************************
 *                 Rutas Frecuencias                    *
 ********************************************************
 */

  // Obtiene todos las frecuencias de base de datos
  Route::get('frecuencias', function() { return Frecuencias::all(); });

  // Obtiene la frecuencia con el códiga obtenido por url de base de datos
  Route::get('frecuencia/{codigoFrecuencia}', function($codigoFrecuencia) {
     return Frecuencias::where('codigoFrecuencia', $codigoFrecuencia)->firstOrFail();
 });
 
 // Almacena la frecuencia obtenida de la petición en base de datos
 Route::post('frecuencia', function (Request $request) {
     try {
         $frecuencia = new Frecuencias();
         $frecuencia->codigoFrecuencia = $request->codigoFrecuencia;
         $frecuencia->descripcionFrecuencia = $request->descripcionFrecuencia;
         $frecuencia->save();
     } catch (\Throwable $th) {
         return response()->json(["message" => 'Error al crear la frecuencia ' . $request->descripcionFrecuencia, "status" => 400, "trace" => $th], 400);
     }
 });
 
 // Actualiza la descripción de la frecuencia en base de datos
 Route::put('frecuencia/{codigoFrecuencia}', function($codigoFrecuencia, Request $request) {
     try {
         $frecuencia = Frecuencias::where('codigoFrecuencia', $codigoPFrecuencias)->firstOrFail();
         $frecuencia->descripcionPFrecuencias = $request->descripcionFrecuenciaso;
         $frecuencia->save();
         return true;
     } catch (\Throwable $th) {
         return response()->json(["message" => 'Error al actualizar la frecuencia con código ' . $codigoFrecuencia, "status" => 400, "trace" => $th], 400);
     }
 });
 
 // Elimina la frecuencia con el código obtenido por url
 Route::delete('frecuencia/{codigoFrecuencia}', function($codigoFrecuencia) {
     try {
         return Frecuencias::where('codigoFrecuencia', $codigoFrecuencia)->delete();
     } catch (\Throwable $th) {
         return response()->json(["message" => 'Error al eliminar la frecuencia porque comparte información con algunos componentes', "status" => 400, "trace" => $th], 400);
     }
 });
 
/********************************************************
 *                 Rutas Distancias                     *
 ********************************************************
 */

  // Obtiene todos las distancias de base de datos
  Route::get('distancias', function() { return Distancias::all(); });

  // Obtiene la frecuencia con el códiga obtenido por url de base de datos
  Route::get('distancia/{codigoDistancia}', function($codigoDistancia) {
     return Distancias::where('codigoDistancia', $codigoDistancia)->firstOrFail();
 });
 
 // Almacena la frecuencia obtenida de la petición en base de datos
 Route::post('distancia', function (Request $request) {
     try {
         $distancia = new Frecuencias();
         $distancia->codigoDistancia = $request->codigoDistancia;
         $distancia->descripcionDistancia = $request->descripcionDistancia;
         $distancia->save();
     } catch (\Throwable $th) {
         return response()->json(["message" => 'Error al crear la distancia ' . $request->descripcionDistancia, "status" => 400, "trace" => $th], 400);
     }
 });
 
 // Actualiza la frecuencia de la frecuencia en base de datos
 Route::put('distancia/{codigoFrecuencia}', function($codigoFrecuencia, Request $request) {
     try {
         $distancia = Distancias::where('codigoDistancia', $codigoDistancia)->firstOrFail();
         $distancia->descripcionDistancia = $request->descripcionDistancia;
         $distancia->save();
         return true;
     } catch (\Throwable $th) {
         return response()->json(["message" => 'Error al actualizar la distancia con código ' . $codigoDistancia, "status" => 400, "trace" => $th], 400);
     }
 });
 
 // Elimina la distancia con el código obtenido por url
 Route::delete('distancia/{codigoDistancia}', function($codigoDistancia) {
     try {
         return Distancias::where('codigoDistancia', $codigoDistancia)->delete();
     } catch (\Throwable $th) {
         return response()->json(["message" => 'Error al eliminar la distancia porque comparte información con algunos componentes', "status" => 400, "trace" => $th], 400);
     }
 });

 
/********************************************************
 *          Rutas Entidades Educaticas                  *
 *******************************************************/

  // Obtiene todos las entidades educativas de base de datos
  Route::get('entidadesEducativas', function() { 
      return EntidadesEducativas::with('sede','jornada')
      ->orderBy('codigoSede')
      ->orderBy('codigoJornada')
      ->orderBy('codigoEntidadEducativa')
      ->get();
    });

  // Obtiene la entidad educativa con el códiga obtenido por url de base de datos
  Route::get('entidadEducativa/{codigoEntidadEducativa}', function($codigoEntidadEducativa) {
     return EntidadesEducativas::where('codigoEntidadEducativa', $codigoEntidadEducativa)->firstOrFail();
 });
 
 // Almacena la entidad educativa obtenida de la petición en base de datos
 Route::post('entidadEducativa', function (Request $request) {
     try {
         $entidadEducativa = new EntidadesEducativas();
         $entidadEducativa->codigoEntidadEducativa = $request->codigoEntidadEducativa;
         $entidadEducativa->nombreEntidadEducativa = $request->nombreEntidadEducativa;
         $entidadEducativa->save();
     } catch (\Throwable $th) {
         return response()->json(["message" => 'Error al crear la entidad educativa ' . $request->nombreEntidadEducativa, "status" => 400, "trace" => $th], 400);
     }
 });
 
 // Actualiza la entidad educativa de la frecuencia en base de datos
 Route::put('entidadEducativa/{codigoEntidadEducativa}', function($codigoEntidadEducativa, Request $request) {
     try {
         $entidadEducativa = EntidadesEducativas::where('codigoEntidadEducativa', $codigoEntidadEducativa)->firstOrFail();
         $entidadEducativa->descripcionDistancia = $request->descripcionDistancia;
         $entidadEducativa->save();
         return true;
     } catch (\Throwable $th) {
         return response()->json(["message" => 'Error al actualizar la distancia con código ' . $codigoEntidadEducativa, "status" => 400, "trace" => $th], 400);
     }
 });
 
 // Elimina la entidad educativa con el código obtenido por url
 Route::delete('entidadEducativa/{codigoEntidadEducativa}', function($codigoEntidadEducativa) {
     try {
         return EntidadesEducativas::where('codigoEntidadEducativa', $codigoEntidadEducativa)->delete();
     } catch (\Throwable $th) {
         return response()->json(["message" => 'Error al eliminar la entidad educativa porque comparte información con algunos componentes', "status" => 400, "trace" => $th], 400);
     }
 });
 
/********************************************************
 *                     Rutas Jornadas                   *
 ********************************************************
 */

  // Obtiene todos las jornadas de base de datos
  Route::get('jornadas', function() { return Jornadas::all(); });

  // Obtiene la jornada con el códiga obtenido por url de base de datos
  Route::get('jornada/{codigoJornada}', function($codigoJornada) {
     return Jornadas::where('codigoJornada', $codigoJornada)->firstOrFail();
 });
 
 // Almacena la jornada obtenida de la petición en base de datos
 Route::post('jornada', function (Request $request) {
     try {
         $jornada= new Jornadas();
         $jornada->codigoJornada = $request->codigoJornada;
         $jornada->descripcionJornada = $request->descripcionJornada;
         $jornada->save();
     } catch (\Throwable $th) {
         return response()->json(["message" => 'Error al crear la jornada ' . $request->descripcionJornada, "status" => 400, "trace" => $th], 400);
     }
 });
 
 // Actualiza la jornada de la frecuencia en base de datos
 Route::put('jornadas/{codigoJornada}', function($codigoJornada, Request $request) {
     try {
         $jornada = Jornadas::where('codigoJornada', $codigoJornada)->firstOrFail();
         $jornada->descripcionJornada = $request->descripcionJornada;
         $jornada->save();
         return true;
     } catch (\Throwable $th) {
         return response()->json(["message" => 'Error al actualizar la jornada con código ' . $codigoJornada, "status" => 400, "trace" => $th], 400);
     }
 });
 
 // Elimina la jornada con el código obtenido por url
 Route::delete('jornada/{codigoJornada}', function($codigoJornada) {
     try {
         return Jornadas::where('codigoJornada', $codigoJornada)->delete();
     } catch (\Throwable $th) {
         return response()->json(["message" => 'Error al eliminar la jornada porque comparte información con algunos componentes', "status" => 400, "trace" => $th], 400);
     }
 });

 /********************************************************
 *                      Rutas Cargos                     *
 ********************************************************/

  // Obtiene todos los cargos de base de datos
  Route::get('cargos', function() { return Cargos::all(); });

  // Obtiene el cargo con el códiga obtenido por url de base de datos
  Route::get('cargo/{codigoCargo}', function($codigoCargo) {
     return Cargos::where('codigoCargo', $codigoCargo)->firstOrFail();
 });
 
 // Almacena el cargo obtenida de la petición en base de datos
 Route::post('cargo', function (Request $request) {
     try {
         $cargo=new Cargos();
         $cargo->codigoCargo = $request->codigoCargo;
         $cargo->descripcionCargo = $request->descripcionCargo;
         $cargo->save();
     } catch (\Throwable $th) {
         return response()->json(["message" => 'Error al crear el cargo ' . $request->descripcionCargo, "status" => 400, "trace" => $th], 400);
     }
 });
 
 // Actualiza el cargo de la frecuencia en base de datos
 Route::put('cargo/{codigoCargo}', function($codigoCargo, Request $request) {
     try {
         $cargo = Jornadas::where('codigoCargo', $codigoCargo)->firstOrFail();
         $cargo->descripcionCargo = $request->descripcionCargo;
         $cargo->save();
         return true;
     } catch (\Throwable $th) {
         return response()->json(["message" => 'Error al actualizar el cargo con código ' . $codigoCargo, "status" => 400, "trace" => $th], 400);
     }
 });
 
 // Elimina el cargo con el código obtenido por url
 Route::delete('cargo/{codigoCargo}', function($codigoCargo) {
     try {
         return Cargos::where('codigoCargo', $codigoCargo)->delete();
     } catch (\Throwable $th) {
         return response()->json(["message" => 'Error al eliminar el cargo porque comparte información con algunos componentes', "status" => 400, "trace" => $th], 400);
     }
 });

 
 /********************************************************
 *                      Rutas Grados                     *
 ********************************************************/

  // Obtiene todos las grados de base de datos
  Route::get('grados', function() { return Grados::all(); });

  // Obtiene el grado con el códiga obtenido por url de base de datos
  Route::get('grado/{codigoGrado}', function($codigoGrado) {
     return Grados::where('codigoGrado', $codigoGrado)->firstOrFail();
 });
 
 // Almacena el grado obtenida de la petición en base de datos
 Route::post('grado', function (Request $request) {
     try {
         $grado=new Grados();
         $grado->codigoGrado = $request->codigoGrado;
         $grado->descripcionGrado = $request->descripcionGrado;
         $grado->save();
     } catch (\Throwable $th) {
         return response()->json(["message" => 'Error al crear el cargo ' . $request->descripcionGrado, "status" => 400, "trace" => $th], 400);
     }
 });
 
 // Actualiza el grado de la frecuencia en base de datos
 Route::put('grado/{codigoGrado}', function($codigoGrado, Request $request) {
     try {
         $grado = Grados::where('codigoGrado', $codigoGrado)->firstOrFail();
         $grado->descripcionGrado = $request->descripcionGrado;
         $grado->save();
         return true;
     } catch (\Throwable $th) {
         return response()->json(["message" => 'Error al actualizar el cargo el grado ' . $codigoGrado, "status" => 400, "trace" => $th], 400);
     }
 });
 
 // Elimina el grado con el código obtenido por url
 Route::delete('grado/{codigoGrado}', function($codigoGrado) {
     try {
         return Grados::where('codigoGrado', $codigoGrado)->delete();
     } catch (\Throwable $th) {
         return response()->json(["message" => 'Error al eliminar el grado porque comparte información con algunos componentes', "status" => 400, "trace" => $th], 400);
     }
 });

  
 /********************************************************
 *                  Rutas Dependencias                   *
 ********************************************************/

  // Obtiene todos las dependencias de base de datos
  Route::get('dependencias', function() { return Dependencias::all(); });

  // Obtiene la dependencia con el códiga obtenido por url de base de datos
  Route::get('dependencia/{codigoDependencia}', function($codigoDependencia) {
     return Dependencias::where('codigoDependencia', $codigoDependencia)->firstOrFail();
 });
 
 // Almacena la dependencia obtenida de la petición en base de datos
 Route::post('dependencia', function (Request $request) {
     try {
         $dependencia=new Dependencias();
         $dependencia->codigoDependencia = $request->codigoDependencia;
         $dependencia->descripcionDependencia = $request->descripcionDependencia;
         $dependencia->save();
     } catch (\Throwable $th) {
         return response()->json(["message" => 'Error al crear el cargo ' . $request->descripcionDependencia, "status" => 400, "trace" => $th], 400);
     }
 });
 
 // Actualiza la dependencia de la frecuencia en base de datos
 Route::put('dependencia/{codigoDependencia}', function($codigoDependencia, Request $request) {
     try {
         $dependencia = Dependencias::where('codigoDependencia', $codigoDependencia)->firstOrFail();
         $dependencia->descripcionDependencia = $request->descripcionDependencia;
         $dependencia->save();
         return true;
     } catch (\Throwable $th) {
         return response()->json(["message" => 'Error al actualizar el cargo el grado ' . $codigoDependencia, "status" => 400, "trace" => $th], 400);
     }
 });
 
 // Elimina la dependencia con el código obtenido por url
 Route::delete('dependencia/{codigoDependencia}', function($codigoDependencia) {
     try {
         return Dependencias::where('codigoDependencia', $codigoDependencia)->delete();
     } catch (\Throwable $th) {
         return response()->json(["message" => 'Error al eliminar la dependencia porque comparte información con algunos componentes', "status" => 400, "trace" => $th], 400);
     }
 });

 
 /********************************************************
 *                      Rutas Sedes                      *
 ********************************************************/


  // Obtiene todos las sedes de base de datos
  Route::get('sedes', function() { return Sedes::all(); });

  // Obtiene la sede con el códiga obtenido por url de base de datos
  Route::get('sede/{codigoSede}', function($codigoSede) {
     return Sedes::where('codigoSede', $codigoSede)->firstOrFail();
 });
 
 // Almacena la sede obtenida de la petición en base de datos
 Route::post('sede', function (Request $request) {
     try {
         $sede=new Sede();
         $sede->codigoSede = $request->codigoSede;
         $sede->descripcionSede = $request->descripcionSede;
         $sede->save();
     } catch (\Throwable $th) {
         return response()->json(["message" => 'Error al crear la sede ' . $request->descripcionSede, "status" => 400, "trace" => $th], 400);
     }
 });
 
 // Actualiza la sede de la frecuencia en base de datos
 Route::put('sede/{codigoSede}', function($codigoSede, Request $request) {
     try {
         $sede = Sedes::where('codigoSede', $codigoSede)->firstOrFail();
         $sede->descripcionSede = $request->descripcionSede;
         $sede->save();
         return true;
     } catch (\Throwable $th) {
         return response()->json(["message" => 'Error al actualizar el cargo la sede ' . $codigoSede, "status" => 400, "trace" => $th], 400);
     }
 });
 
 // Elimina la sede con el código obtenido por url
 Route::delete('sede/{codigoSede}', function($codigoSede) {
     try {
         return Sedes::where('codigoSede', $codigoSede)->delete();
     } catch (\Throwable $th) {
         return response()->json(["message" => 'Error al eliminar la sede porque comparte información con algunos componentes', "status" => 400, "trace" => $th], 400);
     }
 });