<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Cliente;

class ClienteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Cliente::create([
            'nombre' => 'Juan',
            'apellido' => 'Pérez',
            'tipoDocumento' => 'CC',
            'numeroDocumento' => '1002003001',
            'telefono' => '3001234567',
            'correoElectronico' => 'juanperez@example.com',
            'direccion' => 'Calle 123 #45-67',
        ]);

        Cliente::create([
            'nombre' => 'María',
            'apellido' => 'López',
            'tipoDocumento' => 'CC',
            'numeroDocumento' => '1002003002',
            'telefono' => '3019876543',
            'correoElectronico' => 'marialopez@example.com',
            'direccion' => 'Carrera 10 #20-30',
        ]);

        Cliente::create([
            'nombre' => 'Carlos',
            'apellido' => 'Gómez',
            'tipoDocumento' => 'CC',
            'numeroDocumento' => '1002003003',
            'telefono' => '3025556677',
            'correoElectronico' => 'carlosgomez@example.com',
            'direccion' => 'Avenida Siempre Viva #742',
        ]);
    }
}
