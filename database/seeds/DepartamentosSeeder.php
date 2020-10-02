<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DepartamentosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('departamentos')->insert(["codigoDepartamento" => "05", "descripcionDepartamento" => "ANTIOQUIA", "codigoPais" => "57"]);
        DB::table('departamentos')->insert(["codigoDepartamento" => "08", "descripcionDepartamento" => "ATLANTICO", "codigoPais" => "57"]);
        DB::table('departamentos')->insert(["codigoDepartamento" => "11", "descripcionDepartamento" => "BOGOTA", "codigoPais" => "57"]);
        DB::table('departamentos')->insert(["codigoDepartamento" => "13", "descripcionDepartamento" => "BOLIVAR", "codigoPais" => "57"]);
        DB::table('departamentos')->insert(["codigoDepartamento" => "15", "descripcionDepartamento" => "BOYACA", "codigoPais" => "57"]);
        DB::table('departamentos')->insert(["codigoDepartamento" => "17", "descripcionDepartamento" => "CALDAS", "codigoPais" => "57"]);
        DB::table('departamentos')->insert(["codigoDepartamento" => "18", "descripcionDepartamento" => "CAQUETA", "codigoPais" => "57"]);
        DB::table('departamentos')->insert(["codigoDepartamento" => "19", "descripcionDepartamento" => "CAUCA", "codigoPais" => "57"]);
        DB::table('departamentos')->insert(["codigoDepartamento" => "20", "descripcionDepartamento" => "CESAR", "codigoPais" => "57"]);
        DB::table('departamentos')->insert(["codigoDepartamento" => "23", "descripcionDepartamento" => "CORDOBA", "codigoPais" => "57"]);
        DB::table('departamentos')->insert(["codigoDepartamento" => "25", "descripcionDepartamento" => "CUNDINAMARCA", "codigoPais" => "57"]);
        DB::table('departamentos')->insert(["codigoDepartamento" => "27", "descripcionDepartamento" => "CHOCO", "codigoPais" => "57"]);
        DB::table('departamentos')->insert(["codigoDepartamento" => "41", "descripcionDepartamento" => "HUILA", "codigoPais" => "57"]);
        DB::table('departamentos')->insert(["codigoDepartamento" => "44", "descripcionDepartamento" => "LA GUAJIRA", "codigoPais" => "57"]);
        DB::table('departamentos')->insert(["codigoDepartamento" => "47", "descripcionDepartamento" => "MAGDALENA", "codigoPais" => "57"]);
        DB::table('departamentos')->insert(["codigoDepartamento" => "50", "descripcionDepartamento" => "META", "codigoPais" => "57"]);
        DB::table('departamentos')->insert(["codigoDepartamento" => "52", "descripcionDepartamento" => "NARIÑO", "codigoPais" => "57"]);
        DB::table('departamentos')->insert(["codigoDepartamento" => "54", "descripcionDepartamento" => "N. DE SANTANDER", "codigoPais" => "57"]);
        DB::table('departamentos')->insert(["codigoDepartamento" => "63", "descripcionDepartamento" => "QUINDIO", "codigoPais" => "57"]);
        DB::table('departamentos')->insert(["codigoDepartamento" => "66", "descripcionDepartamento" => "RISARALDA", "codigoPais" => "57"]);
        DB::table('departamentos')->insert(["codigoDepartamento" => "68", "descripcionDepartamento" => "SANTANDER", "codigoPais" => "57"]);
        DB::table('departamentos')->insert(["codigoDepartamento" => "70", "descripcionDepartamento" => "SUCRE", "codigoPais" => "57"]);
        DB::table('departamentos')->insert(["codigoDepartamento" => "73", "descripcionDepartamento" => "TOLIMA", "codigoPais" => "57"]);
        DB::table('departamentos')->insert(["codigoDepartamento" => "76", "descripcionDepartamento" => "VALLE DEL CAUCA", "codigoPais" => "57"]);
        DB::table('departamentos')->insert(["codigoDepartamento" => "81", "descripcionDepartamento" => "ARAUCA", "codigoPais" => "57"]);
        DB::table('departamentos')->insert(["codigoDepartamento" => "85", "descripcionDepartamento" => "CASANARE", "codigoPais" => "57"]);
        DB::table('departamentos')->insert(["codigoDepartamento" => "86", "descripcionDepartamento" => "PUTUMAYO", "codigoPais" => "57"]);
        DB::table('departamentos')->insert(["codigoDepartamento" => "88", "descripcionDepartamento" => "SAN ANDRES", "codigoPais" => "57"]);
        DB::table('departamentos')->insert(["codigoDepartamento" => "91", "descripcionDepartamento" => "AMAZONAS", "codigoPais" => "57"]);
        DB::table('departamentos')->insert(["codigoDepartamento" => "94", "descripcionDepartamento" => "GUAINIA", "codigoPais" => "57"]);
        DB::table('departamentos')->insert(["codigoDepartamento" => "95", "descripcionDepartamento" => "GUAVIARE", "codigoPais" => "57"]);
        DB::table('departamentos')->insert(["codigoDepartamento" => "97", "descripcionDepartamento" => "VAUPES", "codigoPais" => "57"]);
        DB::table('departamentos')->insert(["codigoDepartamento" => "99", "descripcionDepartamento" => "VICHADA", "codigoPais" => "57"]);
    }
}
