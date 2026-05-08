<?php

namespace Database\Seeders;

use App\Models\Especie;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EspecieSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $fill = [
            [
                'nombre' => 'Canino',
                'descripcion' => 'Familia canina',
            ],
            [
                'nombre' => 'Felino',
                'descripcion' => 'Famila felina',
            ],
        ];
        foreach ($fill as $fills){
            Especie::create($fills);
        }
    }
}
