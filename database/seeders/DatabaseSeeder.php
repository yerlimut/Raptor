<?php

namespace Database\Seeders;

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
            DiagnosticoSeeder::class,
            InventarioSeeder::class,
            MotoSeeder::class,
            PreordenSeeder::class,
            
        ]);
    }
}
