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
            InventarioSeeder::class,
            MotoSeeder::class,
            DiagnosticoSeeder::class,
            OrdenTrabajo::class,
            PreordenSeeder::class,
            
        ]);
    }
}
