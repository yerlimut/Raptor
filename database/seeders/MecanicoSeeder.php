<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Mecanico;

class MecanicoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Mecanico::create([
            'nombre' => 'Carlos Andrés',
            'apellido' => 'Ramírez Gómez',
            'tipoDocumento' => 'CC',
            'numeroDocumento' => '1012456789',
            'telefono' => '3124567890',
            'email' => 'carlos.ramirez@example.com',
            'direccion' => 'Calle 45 #23-10, Medellín',
            'especialidad' => 'Motor y transmisión',
        ]);

        Mecanico::create([
            'nombre' => 'Laura Marcela',
            'apellido' => 'González Rojas',
            'tipoDocumento' => 'CC',
            'numeroDocumento' => '1009876543',
            'telefono' => '3209876543',
            'email' => 'laura.gonzalez@example.com',
            'direccion' => 'Carrera 12 #45-22, Bogotá',
            'especialidad' => 'Sistema eléctrico',
        ]);

        Mecanico::create([
            'nombre' => 'Julián Esteban',
            'apellido' => 'Pérez Castro',
            'tipoDocumento' => 'CE',
            'numeroDocumento' => 'XE234567',
            'telefono' => '3112345678',
            'email' => 'julian.perez@example.com',
            'direccion' => 'Av. del Ferrocarril #8-60, Cali',
            'especialidad' => 'Suspensión y frenos',
        ]);

        Mecanico::create([
            'nombre' => 'Sofía Natalia',
            'apellido' => 'Martínez López',
            'tipoDocumento' => 'CC',
            'numeroDocumento' => '1011122233',
            'telefono' => '3001234567',
            'email' => 'sofia.martinez@example.com',
            'direccion' => 'Calle 10 #6-20, Bucaramanga',
            'especialidad' => 'Diagnóstico electrónico',
        ]);

        Mecanico::create([
            'nombre' => 'Diego Alejandro',
            'apellido' => 'Torres Peña',
            'tipoDocumento' => 'CC',
            'numeroDocumento' => '1023344556',
            'telefono' => '3017654321',
            'email' => 'diego.torres@example.com',
            'direccion' => 'Carrera 7 #89-50, Barranquilla',
            'especialidad' => 'Carburación y sistemas de escape',
        ]);
    }
}
