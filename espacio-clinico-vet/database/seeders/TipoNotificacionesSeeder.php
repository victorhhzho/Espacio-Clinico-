<?php

namespace Database\Seeders;

use App\Models\TipoNotificaciones;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TipoNotificacionesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $fill = [
            [
                'nombre' => 'Paciente',
                'descripcion' => 'Notificaciones para movimientos en perfiles clinicos.',
            ],
            [
                'nombre' => 'Agenda',
                'descripcion' => 'Notificaciones para control de citas.',
            ],
            [
                'nombre' => 'Venta',
                'descripcion' => 'Notificicacion sobre ventas en proceso.',
            ],
            [
                'nombre' => 'Inventario',
                'descripcion' => 'Notificacion sobre el control de inventario y stock.',
            ],
            [
                'nombre' => 'Otro',
                'descripcion' => 'Notificación de una categoría no definida',
            ],
        ];
        foreach ($fill as $fills){
            TipoNotificaciones::create($fills);
        }
    }
}
