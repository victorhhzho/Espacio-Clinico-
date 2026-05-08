<?php

namespace Database\Seeders;

use App\Models\Paciente;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PacienteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $fill = [        
            [
                'pro_nombre' => 'Armando',
                'pro_apellidop' => 'Gonzalez',
                'pro_apellidom' => 'Ochoa',
                'direccion' => 'El campanar #34 Col. Las Cascadas, Pueblito, Corregidora Querétaro',
                'telefono' => '3211232321',
                'celular' => '1232321333',
                'pro_observaciones' => 'Es una persona muy amable',
        
                'nombre' => 'Pichi',
                'especie' => '1',
                'raza' => '4',
                'sexo' => '1',
                'edad' => '4',
                'peso' => '10',
                'color' => 'Café',
                'alimentacion' => 'Croquetas Nupec',
        
                'ult_desp' => '2023-01-26',
                'v_sextuple' => '2023-05-10',
                'v_rabia' => '2023-03-26',
                
                'prox_vacuna' => 'Vacuna Rabía',
                'fecha_prox_vacuna' => '2024-03-10',
                
                'cirugias' => 'No ha entrado a quirofano',
                'obs_estetica' => 'Es muy calmado',
                'obs_clinicas' => 'Es un paciente muy tranquilo',
                'obs_pension' => 'Come mucho',
        
                'ult_visita' => '2023-09-03',
            ],
        ];
        foreach ($fill as $fills){
            Paciente::create($fills);
        }
    }
}
