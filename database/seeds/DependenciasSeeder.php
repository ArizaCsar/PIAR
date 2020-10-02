<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DependenciasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('dependencias')->insert(["descripcionDependencia" => "Tesorería"]);
        DB::table('dependencias')->insert(["descripcionDependencia" => "Administración"]);
        DB::table('dependencias')->insert(["descripcionDependencia" => "Operación"]);
        DB::table('dependencias')->insert(["descripcionDependencia" => "Sistema"]);
    }
}
