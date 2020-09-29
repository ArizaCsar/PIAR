<?php

namespace App\Http\Controllers;

use App\Terceros;
use Illuminate\Http\Request;

class Login extends Controller
{
    function doLogin(Request $request) {

        $resultTercero = Terceros::where([
            ['nombreTercero', $request->nombreTercero],
            ['contrasena', $request->contrasena]
        ])->firstOrFail();
        dd($resultTercero);
    }
}
