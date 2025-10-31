<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\OrdenTrabajo;

class OrdenTrabajoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        OrdenTrabajo::create([
            'fechaInicio' => '2025-10-15',
            'fechaFin' => null,
            'estado' => 'pendiente',
            'idDiagnostico' => 1,
        ]);

        OrdenTrabajo::create([
            'fechaInicio' => '2025-10-10',
            'fechaFin' => '2025-10-12',
            'estado' => 'finalizado',
            'idDiagnostico' => 2,
        ]);

        OrdenTrabajo::create([
            'fechaInicio' => '2025-10-18',
            'fechaFin' => null,
            'estado' => 'en proceso',
            'idDiagnostico' => 3,
        ]);

        OrdenTrabajo::create([
            'fechaInicio' => '2025-10-05',
            'fechaFin' => null,
            'estado' => 'cancelado',
            'idDiagnostico' => 4,
        ]);

        OrdenTrabajo::create([
            'fechaInicio' => '2025-09-28',
            'fechaFin' => '2025-10-02',
            'estado' => 'finalizado',
            'idDiagnostico' => 5,
        ]);
    }
}
