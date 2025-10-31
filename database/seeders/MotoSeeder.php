<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Moto;

class MotoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Moto::create([
            'modelo' => 'CB 125F',
            'año' => '2023-01-01',
            'placa' => 'ABC123',
            'idCliente' => 1,
            'idMarca' => 1,
        ]);

        Moto::create([
            'modelo' => 'Pulsar NS200',
            'año' => '2022-01-01',
            'placa' => 'XYZ456',
            'idCliente' => 2,
            'idMarca' => 2,
        ]);

        Moto::create([
            'modelo' => 'YBR 125',
            'año' => '2021-01-01',
            'placa' => 'LMN789',
            'idCliente' => 3,
            'idMarca' => 3,
        ]);

        Moto::create([
            'modelo' => 'Dominar 400',
            'año' => '2024-01-01',
            'placa' => 'QWE321',
            'idCliente' => 4,
            'idMarca' => 2,
        ]);

        Moto::create([
            'modelo' => 'NK 150',
            'año' => '2020-01-01',
            'placa' => 'RTY654',
            'idCliente' => 5,
            'idMarca' => 4,
        ]);
    }
}
