<?php

namespace App\Http\Controllers;

use App\Terceros;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class Login extends Controller
{
    function doLogin(Request $request) {

        // Obtiene el tercero con el nombre ingresado
        $resultTercero = Terceros::where(
            'nombreTercero', $request->nombreTercero
        )->first();

        if( !$resultTercero ) {
            return response()->json($this->_userNotFound(), 401);
        }

        if(Hash::check($request->contrasena, $resultTercero->contrasena)) {
            return response()->json($this->_getLoggedUser($resultTercero), 200);
        } else {
            return response()->json($this->_userNotFound(), 401);
        }
    }

    private function _userNotFound() {
        return [
            "message" => "Usuario o contraseña incorrectos",
            "status" => 401
        ];
    }

    private function _getLoggedUser(Terceros $tercero) {

        $now = new DateTime();
        $token = Hash::make($now->getTimeStamp());

        // crea la session con la info del token
        session(['session_token' => $token, 'user' => $tercero]);

        return [
            "token" => session('session_token'),
            "user" => $tercero
        ];
    }
}
