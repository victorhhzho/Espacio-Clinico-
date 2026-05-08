<?php

namespace Database\Seeders;

use App\Models\Sexo;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SexoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $fill = [
            [
                'nombre' => 'Macho',
            ],
            [
                'nombre' => 'Hembra',
            ],
        ];
        foreach ($fill as $fills){
            Sexo::create($fills);
        }
    }
}
