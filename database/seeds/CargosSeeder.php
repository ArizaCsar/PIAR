<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CargosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('cargos')->insert(["descripcionCargo" => "Administrador"]);
        DB::table('cargos')->insert(["descripcionCargo" => "Diligente"]);
        DB::table('cargos')->insert(["descripcionCargo" => "Docente"]);
        DB::table('cargos')->insert(["descripcionCargo" => "Directivo docente"]);
        DB::table('cargos')->insert(["descripcionCargo" => "Sistema"]);
    }
}
