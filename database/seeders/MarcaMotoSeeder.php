<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\MarcaMoto;

class MarcaMotoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $marcas = [
            // Marcas más populares en Colombia
            'AKT',
            'Bajaj',
            'Pulsar',        // línea de Bajaj, pero muy conocida como marca en Colombia
            'TVS',
            'Apache',        // de TVS, muy reconocida en Colombia
            'Hero',
            'Honda',
            'Yamaha',
            'Suzuki',
            'Kawasaki',

            // Otras que se ven en Colombia
            'KTM',
            'Royal Enfield',
            'Benelli',
            'BMW',
            'Ducati',
            'Italika',
            'CFMoto',
            'Kymco',
            'SYM',
            'Victory',       // línea de Auteco
            'Starker',       // motos eléctricas en Colombia
        ];

        foreach ($marcas as $marca) {
            MarcaMoto::create(['nombreMarca' => $marca]);
        }
    }
}
