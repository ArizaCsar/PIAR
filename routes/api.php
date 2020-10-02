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
Route::post('login',[LoginController::class, 'doLogin'], function () {
});

/**
 * Rutas pais
 *
 */

Route::get('paises', function() { return Paises::all(); });

Route::get('pais/{codigoPais}', function($codigoPais) {
    return Paises::where('codigoPais', $codigoPais)->firstOrFail();
});

Route::post('users/{id}', function ($id) {

});
/**
 * Rutas Ciudad
 *
 */

