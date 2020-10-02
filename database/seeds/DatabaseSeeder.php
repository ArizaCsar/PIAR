<?php

use App\Dependencias;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(PaisesSeeder::class);
        $this->call(DepartamentosSeeder::class);
        $this->call(CiudadesSeeder::class);
        $this->call(CargosSeeder::class);
        $this->call(DependenciasSeeder::class);
        $this->call(TercerosSeeder::class);
    }
}
