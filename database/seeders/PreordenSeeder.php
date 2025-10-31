<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Preorden;

class PreordenSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Preorden::create([
            'idOrden' => 1,
            'idMecanico' => 1,
            'descripcion' => 'Cambio de aceite y revisión general.',
            'saldo' => 180000.00,
        ]);

        Preorden::create([
            'idOrden' => 2,
            'idMecanico' => 2,
            'descripcion' => 'Reemplazo de frenos delanteros.',
            'saldo' => 360000.00,
        ]);

        Preorden::create([
            'idOrden' => 3,
            'idMecanico' => 3,
            'descripcion' => 'Diagnóstico eléctrico y ajuste de luces.',
            'saldo' => 120000.00,
        ]);

        Preorden::create([
            'idOrden' => 4,
            'idMecanico' => 4,
            'descripcion' => 'Cambio de llantas traseras y balanceo.',
            'saldo' => 240000.00,
        ]);

        Preorden::create([
            'idOrden' => 5,
            'idMecanico' => 5,
            'descripcion' => 'Mantenimiento completo del sistema de frenos.',
            'saldo' => 420000.00,
        ]);
    }
}
