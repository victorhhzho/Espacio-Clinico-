<?php

namespace Database\Seeders;

use App\Models\EstadoNotificaciones;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EstadoNotificacionesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $fill = [
            [
                'nombre' => 'Alerta',
                'descripcion' => 'Esta alerta se activa cuando sucede algo muy importante.',
            ],
            [
                'nombre' => 'Sugerencia',
                'descripcion' => 'Esta notificaciones sucede para sugerir acciones.',
            ],
            [
                'nombre' => 'Recordatorio',
                'descripcion' => 'Esta notificaciones sirve para recordar actividades.',
            ],
        ];
        foreach ($fill as $fills){
            EstadoNotificaciones::create($fills);
        }
    }
}
