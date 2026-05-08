<?php

namespace Database\Seeders;

use App\Models\Consulta;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ConsultaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $fill = [        
            [
                'paciente' => '1',
                'tipo_consulta' => '3',
                'medico' => 'Jorge Galván',
                'cedula' => '4324353262',
                'fecha' => '2023-09-03',
        
                'motivo' => 'No puede orinar',
            ],
        ];
        foreach ($fill as $fills){
            Consulta::create($fills);
        }
    }
}
