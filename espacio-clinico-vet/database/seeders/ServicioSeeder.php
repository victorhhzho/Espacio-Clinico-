<?php

namespace Database\Seeders;

use App\Models\Servicio;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ServicioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $fill = [
            [
                'nombre' => 'Consulta',
                'descripcion' => 'Servicio de consulta general, vacuna, urgencias, etc',
            ],
            [
                'nombre' => 'Hospitalización',
                'descripcion' => 'Notificaciones para control de citas.',
            ],
            [
                'nombre' => 'Cirugia / Procedimiento con sedación',
                'descripcion' => 'Procedimiento quirurgico o de sedación',
            ],
            [
                'nombre' => 'Pensión',
                'descripcion' => 'Servicio de pensión',
            ],
            [
                'nombre' => 'Estética / Baño',
                'descripcion' => 'Servicios de corte de pelo y baño',
            ],
            [
                'nombre' => 'Servicio Externo',
                'descripcion' => 'Servicio de laboratorio, placas, ultrasonidos, cremación',
            ],
            [
                'nombre' => 'Otro',
                'descripcion' => 'Cualquier otro servico',
            ],
        ];
        foreach ($fill as $fills){
            Servicio::create($fills);
        }
    }
}
