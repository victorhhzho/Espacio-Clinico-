<?php

namespace Database\Seeders;

use App\Models\TipoArticulo;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TipoArticuloSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $fill = [
            [
                'nombre' => 'Farmacos',
                'descripcion' => 'Medicamentos de receta',
            ],
            [
                'nombre' => 'Insumos',
                'descripcion' => 'Materiales como jeringas, gasas, etc',
            ],
            [
                'nombre' => 'Material quirurgico',
                'descripcion' => 'Materiales para procedimientos quirugicos',
            ],
            [
                'nombre' => 'Vacunas',
                'descripcion' => 'Todo tipo de vacunas',
            ],
            [
                'nombre' => 'Anestésicos y sedantes',
                'descripcion' => 'Farmacos para sedación',
            ],
            [
                'nombre' => 'Higiene',
                'descripcion' => 'Productos para higiene',
            ],
            [
                'nombre' => 'Estéticos',
                'descripcion' => 'Prendas y correas para mascotas',
            ],
            [
                'nombre' => 'Otros',
                'descripcion' => 'Otra categoría',
            ],
        ];
        foreach ($fill as $fills){
            TipoArticulo::create($fills);
        }
    }
}
