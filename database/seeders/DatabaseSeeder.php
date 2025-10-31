<?php

namespace Database\Seeders;

use App\Models\OrdenTrabajo;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            ClienteSeeder::class,
            CategoriaRepuestosSeeder::class,
            MarcaMotoSeeder::class,
            RepuestoSeeder::class,
            MecanicoSeeder::class,
            MotoSeeder::class,
            InventarioSeeder::class,
            DiagnosticoSeeder::class,
            OrdenTrabajoSeeder::class,
            PreordenSeeder::class,
            
        ]);
    }
}
