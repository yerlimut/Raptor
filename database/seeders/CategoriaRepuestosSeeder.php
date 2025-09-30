<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\CategoriaRepuesto;

class CategoriaRepuestosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        CategoriaRepuesto::create(['nombreCategoria' => 'Motor']);
        CategoriaRepuesto::create(['nombreCategoria' => 'Transmisión']);
        CategoriaRepuesto::create(['nombreCategoria' => 'Frenos']);
        CategoriaRepuesto::create(['nombreCategoria' => 'Suspensión']);
        CategoriaRepuesto::create(['nombreCategoria' => 'Eléctrico']);
        CategoriaRepuesto::create(['nombreCategoria' => 'Carrocería']);
        CategoriaRepuesto::create(['nombreCategoria' => 'Escape']);
        CategoriaRepuesto::create(['nombreCategoria' => 'Ruedas y Neumáticos']);
        CategoriaRepuesto::create(['nombreCategoria' => 'Lubricantes']);
        CategoriaRepuesto::create(['nombreCategoria' => 'Filtros']);
        CategoriaRepuesto::create(['nombreCategoria' => 'Accesorios']);
    }
}
