<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Preorden;
use App\Models\Repuesto;

class PreordenSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Obtener todos los repuestos disponibles
        $repuestos = Repuesto::all();

        // Crear las preórdenes
        $p1 = Preorden::create([
            'idOrden' => 1,
            'idMecanico' => 1,
            'idMoto' => 1, // 👈 agrega este campo
            'descripcion' => 'Cambio de aceite y revisión general.',
            'saldo' => 180000.00,
        ]);

        $p2 = Preorden::create([
            'idOrden' => 2,
            'idMecanico' => 2,
            'idMoto' => 2, // 👈 cambia según tus motos sembradas
            'descripcion' => 'Reemplazo de frenos delanteros.',
            'saldo' => 360000.00,
        ]);

        $p3 = Preorden::create([
            'idOrden' => 3,
            'idMecanico' => 3,
            'idMoto' => 3,
            'descripcion' => 'Diagnóstico eléctrico y ajuste de luces.',
            'saldo' => 120000.00,
        ]);

        $p4 = Preorden::create([
            'idOrden' => 4,
            'idMecanico' => 4,
            'idMoto' => 4,
            'descripcion' => 'Cambio de llantas traseras y balanceo.',
            'saldo' => 240000.00,
        ]);

        $p5 = Preorden::create([
            'idOrden' => 5,
            'idMecanico' => 5,
            'idMoto' => 5,
            'descripcion' => 'Mantenimiento completo del sistema de frenos.',
            'saldo' => 420000.00,
        ]);

        $p6 = Preorden::create([
            'idOrden' => 5,
            'idMecanico' => 5,
            'idMoto' => 1, // o cualquier moto existente
            'descripcion' => 'Ajuste de suspensión y revisión de amortiguadores.',
            'saldo' => 300000.00,
        ]);


        // Asociar diferentes cantidades de repuestos a cada preorden
        $p1->repuestos()->attach($repuestos->random(3)->pluck('id')->toArray()); // 3 repuestos
        $p2->repuestos()->attach($repuestos->random(2)->pluck('id')->toArray()); // 2 repuestos
        $p3->repuestos()->attach($repuestos->random(1)->pluck('id')->toArray()); // 1 repuesto
        $p4->repuestos()->attach($repuestos->random(3)->pluck('id')->toArray()); // 3 repuestos
        $p5->repuestos()->attach($repuestos->random(2)->pluck('id')->toArray()); // 2 repuestos
        $p6->repuestos()->attach($repuestos->random(1)->pluck('id')->toArray()); // 1 repuesto
    }
}
