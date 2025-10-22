<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Repuesto;
use App\Models\CategoriaRepuesto;

class RepuestoSeeder extends Seeder
{
    public function run(): void
    {
        $repuestos = [
            'Motor : Bujía',
            'Motor : Aceite motor',
            'Motor : Correa de distribución',
            'Transmisión : Embrague',
            'Transmisión : Caja de cambios',
            'Transmisión : Palanca de cambios',
            'Frenos : Pastillas de freno',
            'Frenos : Disco de freno',
            'Frenos : Bombín de freno',
            'Suspensión : Amortiguador',
            'Suspensión : Muelles',
            'Suspensión : Barras estabilizadoras',
            'Eléctrico : Batería',
            'Eléctrico : Alternador',
            'Eléctrico : Sensor de luz',
            'Carrocería : Puerta',
            'Carrocería : Capó',
            'Carrocería : Parachoques',
            'Escape : Silenciador',
            'Escape : Tubo de escape',
            'Escape : Catalizador',
            'Ruedas y Neumáticos : Neumático',
            'Ruedas y Neumáticos : Llanta',
            'Ruedas y Neumáticos : Balín de rueda',
            'Lubricantes : Aceite de transmisión',
            'Lubricantes : Grasa',
            'Lubricantes : Aditivos',
            'Filtros : Filtro de aceite',
            'Filtros : Filtro de aire',
            'Filtros : Filtro de combustible',
            'Accesorios : Espejo',
            'Accesorios : Faro',
            'Accesorios : Tapetes',
        ];

        foreach ($repuestos as $nombreCompleto) {
            // Extraemos la categoría del texto (todo antes de los dos puntos)
            [$categoriaNombre, $nombre] = explode(' : ', $nombreCompleto);

            // Buscamos el ID de la categoría en la base de datos
            $categoria = CategoriaRepuesto::where('nombreCategoria', $categoriaNombre)->first();

            // Creamos el repuesto con su categoría correspondiente
            Repuesto::create([
                'nombre' => $nombreCompleto,
                'marca' => 'Genérica',
                'precio' => rand(50000, 200000),
                'stock' => rand(5, 30),
                'idCategoria' => $categoria ? $categoria->id : null,
            ]);
        }
    }
}
