<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Inventario;

class InventarioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Inventario::create([
            'descripcion' => 'Moto ingresada sin un espejo.',
            'fechaRegistro' => '2025-10-10',
            'estadoGeneral' => 'Regular',
            'estadoInventario' => 'En taller',
            'idMoto' => 1,
        ]);

        Inventario::create([
            'descripcion' => 'Moto recibida con direccionales en mal estado .',
            'fechaRegistro' => '2025-09-28',
            'estadoGeneral' => 'Regular',
            'estadoInventario' => 'Entregado',
            'idMoto' => 2,
        ]);

        Inventario::create([
            'descripcion' => 'Moto con frenos trasero dañados.',
            'fechaRegistro' => '2025-10-15',
            'estadoGeneral' => 'Regular',
            'estadoInventario' => 'En taller',
            'idMoto' => 3,
        ]);

        Inventario::create([
            'descripcion' => 'Moto con daños visibles, direccionales,frenos dañados.',
            'fechaRegistro' => '2025-10-05',
            'estadoGeneral' => 'Malo',
            'estadoInventario' => 'Pendiente',
            'idMoto' => 4,
        ]);

        Inventario::create([
            'descripcion' => 'Sin Observaciones.',
            'fechaRegistro' => '2025-10-20',
            'estadoGeneral' => 'Bueno',
            'estadoInventario' => 'En taller',
            'idMoto' => 5,
        ]);
    }
}
