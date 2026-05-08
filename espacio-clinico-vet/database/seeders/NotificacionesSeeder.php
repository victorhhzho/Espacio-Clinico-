<?php

namespace Database\Seeders;

use App\Models\Notificaciones;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Notifications\Notification;

class NotificacionesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
                /* 
                Tipos:
                1. Paciente
                2. Agenda
                3. Venta
                4. Inventario

                Estado:
                1. Alerta
                2. Sugerencia
                3. Recordatorio
                */
        $notificacion = [
            [
                'mensaje' => 'Hace falta Sucralfato',
                'tipo' => '4',
                'estado' => '1',
                'fecha_aviso' => '2023-08-29',
            ],
            [
                'mensaje' => 'El perfil de Astro está inactivo',
                'tipo' => '1',
                'estado' => '2',
                'fecha_aviso' => '2023-08-29',
            ],
            [
                'mensaje' => 'La vacuna de Mila está proxima',
                'tipo' => '4',
                'estado' => '1',
                'fecha_aviso' => '2023-08-29',
            ],
            [
                'mensaje' => 'Tiene que confirmar la cita de Luna',
                'tipo' => '2',
                'estado' => '3',
                'fecha_aviso' => '2023-08-29',
            ]
        ];
        foreach ($notificacion as $notificaciones){
            Notificaciones::create($notificaciones);
        }
    }
}
