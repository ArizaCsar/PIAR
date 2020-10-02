<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class TercerosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('terceros')->insert([
            "contrasena" => Hash::make("test"),
            "nombreTercero" => "Cesar",
            "codigoCargo" => "2",
            "codigoDependencia" => "3"
        ]);

        DB::table('terceros')->insert([
            "contrasena" => Hash::make("test"),
            "nombreTercero" => "Andres",
            "codigoCargo" => "3",
            "codigoDependencia" => "2"
        ]);

        DB::table('terceros')->insert([
            "contrasena" => Hash::make("test"),
            "nombreTercero" => "Yeison",
            "codigoCargo" => "1",
            "codigoDependencia" => "1"
        ]);

        DB::table('terceros')->insert([
            "contrasena" => Hash::make("sistema"),
            "nombreTercero" => "Sistema",
            "codigoCargo" => "1",
            "codigoDependencia" => "4"
        ]);
    }
}
