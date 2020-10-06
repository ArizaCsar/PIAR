<?php

use Illuminate\Http\Request;
use App\DTO\Login;
use App\Http\Controllers\Login as LoginController;
use App\Paises;
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

/**
 * Rutas Ciudad
 *
 */

