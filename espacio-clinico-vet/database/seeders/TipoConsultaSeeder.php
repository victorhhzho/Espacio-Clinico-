<?php

namespace Database\Seeders;

use App\Models\TipoConsulta;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TipoConsultaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $fill = [
            [
                'nombre' => 'General',
                'descripcion' => 'Revisión de un padecimiento comun.',
            ],
            [
                'nombre' => 'Emergencia',
                'descripcion' => 'Atención de emergencia.',
            ],
            [
                'nombre' => 'Desparacitacion',
                'descripcion' => 'Consulta de desparacitación.',
            ],
            [
                'nombre' => 'Vacuna',
                'descripcion' => 'Consulta de aplicación de vacuna.',
            ],
            [
                'nombre' => 'Revisión preoperatoria',
                'descripcion' => 'Evaluación antes de realizar una cirugia.',
            ],
            [
                'nombre' => 'Revisión postoperatoria',
                'descripcion' => 'Revisiones despues de cirgugia. ',
            ],
            [
                'nombre' => 'Revisión continua',
                'descripcion' => 'Revisiones despues de consultas. ',
            ],
            [
                'nombre' => 'Otra',
                'descripcion' => 'Otro tipo de consulta',
            ],
            
        ];
        foreach ($fill as $fills){
            TipoConsulta::create($fills);
        }
    }
}
