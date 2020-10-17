<?php

use Illuminate\Http\Request;
use App\DTO\Login;
use App\Http\Controllers\Login as LoginController;
use App\Paises;
use App\Departamentos;
use App\Ciudades;
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
 Route::get('departamentos', function() { return Departamentos::all(); });

 // Obtiene el departamento con el código obtenido por url de base de datos
 Route::get('departamentos/{codigoDepartamento}', function($codigoDepartamento) {
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
 Route::get('ciudades', function() { return Ciudades::all(); });

 // Obtiene el país con el código obtenido por url de base de datos
 Route::get('ciudad/{codigoCiudad}', function($codigoCiudad) {
    return Ciudades::where('codigoCiudad', $codigoCiudad)->firstOrFail();
});

// Almacena el país obtenido de la petición en base de datos
Route::post('ciudades', function (Request $request) {
    try {
        $ciudad = new Ciudades();
        $ciudad->codigoCiudad = $request->codigoPais;
        $ciudad->descripcionCiudad = $request->descripcionCiudad;
        $ciudad->save();
    } catch (\Throwable $th) {
        return response()->json(["message" => 'Error al crear la ciudad ' . $request->descripcionPais, "status" => 400, "trace" => $th], 400);
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
        return response()->json(["message" => 'Error al actualizar la ciudad con código ' . $codigoPais, "status" => 400, "trace" => $th], 400);
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
