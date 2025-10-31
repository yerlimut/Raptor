<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Diagnostico;

class DiagnosticoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Diagnostico::create([
            'descripcion' => 'Revisión general del sistema eléctrico.',
            'fechaDiagnostico' => '2025-10-15',
            'estado' => 'pendiente',
            'tipo' => 'preventivo',
            'idMoto' => 1,
        ]);

        Diagnostico::create([
            'descripcion' => 'Cambio de aceite y filtro por mantenimiento programado.',
            'fechaDiagnostico' => '2025-09-30',
            'estado' => 'completado',
            'tipo' => 'preventivo',
            'idMoto' => 2,
        ]);

        Diagnostico::create([
            'descripcion' => 'Reparación del sistema de frenos tras detectar pérdida de presión.',
            'fechaDiagnostico' => '2025-10-10',
            'estado' => 'en proceso',
            'tipo' => 'correctivo',
            'idMoto' => 3,
        ]);

        Diagnostico::create([
            'descripcion' => 'Inspección de llantas por desgaste irregular.',
            'fechaDiagnostico' => '2025-10-25',
            'estado' => 'pendiente',
            'tipo' => 'inspeccion',
            'idMoto' => 4,
        ]);

        Diagnostico::create([
            'descripcion' => 'Sustitución del kit de arrastre y revisión de transmisión.',
            'fechaDiagnostico' => '2025-08-20',
            'estado' => 'completado',
            'tipo' => 'correctivo',
            'idMoto' => 5,
        ]);
    }
}
