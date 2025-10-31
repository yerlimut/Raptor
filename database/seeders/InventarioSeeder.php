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
            'descripcion' => 'Moto ingresada para revisión general y limpieza.',
            'fechaRegistro' => '2025-10-10',
            'estadoGeneral' => 'Bueno',
            'estadoInventario' => 'En taller',
            'idMoto' => 1,
        ]);

        Inventario::create([
            'descripcion' => 'Moto entregada tras cambio de aceite y filtro.',
            'fechaRegistro' => '2025-09-28',
            'estadoGeneral' => 'Bueno',
            'estadoInventario' => 'Entregado',
            'idMoto' => 2,
        ]);

        Inventario::create([
            'descripcion' => 'Revisión del sistema de frenos y reemplazo de pastillas.',
            'fechaRegistro' => '2025-10-15',
            'estadoGeneral' => 'Regular',
            'estadoInventario' => 'En taller',
            'idMoto' => 3,
        ]);

        Inventario::create([
            'descripcion' => 'Moto pendiente de repuestos para reparación de motor.',
            'fechaRegistro' => '2025-10-05',
            'estadoGeneral' => 'Malo',
            'estadoInventario' => 'Pendiente',
            'idMoto' => 4,
        ]);

        Inventario::create([
            'descripcion' => 'Inspección final antes de entrega al cliente.',
            'fechaRegistro' => '2025-10-20',
            'estadoGeneral' => 'Bueno',
            'estadoInventario' => 'En taller',
            'idMoto' => 5,
        ]);
    }
}
