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

        Cliente::create([
            'nombre' => 'Laura',
            'apellido' => 'Ramírez',
            'tipoDocumento' => 'CC',
            'numeroDocumento' => '1002003004',
            'telefono' => '3031112233',
            'correoElectronico' => 'lauraramirez@example.com',
            'direccion' => 'Calle 50 #12-34',
        ]);

        Cliente::create([
            'nombre' => 'Andrés',
            'apellido' => 'Torres',
            'tipoDocumento' => 'CC',
            'numeroDocumento' => '1002003005',
            'telefono' => '3047891122',
            'correoElectronico' => 'andrestorres@example.com',
            'direccion' => 'Carrera 80 #45-22',
        ]);

        Cliente::create([
            'nombre' => 'Paola',
            'apellido' => 'Martínez',
            'tipoDocumento' => 'CC',
            'numeroDocumento' => '1002003006',
            'telefono' => '3056678899',
            'correoElectronico' => 'paolamartinez@example.com',
            'direccion' => 'Transversal 45 #67-89',
        ]);

        Cliente::create([
            'nombre' => 'Felipe',
            'apellido' => 'Castro',
            'tipoDocumento' => 'CC',
            'numeroDocumento' => '1002003007',
            'telefono' => '3069991122',
            'correoElectronico' => 'felipecastro@example.com',
            'direccion' => 'Diagonal 90 #10-15',
        ]);
    }
}
