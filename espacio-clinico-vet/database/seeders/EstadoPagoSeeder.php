<?php

namespace Database\Seeders;

use App\Models\EstadoPago;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EstadoPagoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $fill = [
            [
                'nombre' => 'Completo',
                'descripcion' => 'El pago se realizó con exito',
            ],
            [
                'nombre' => 'Pendiente / Incompleto',
                'descripcion' => 'El pago está pendiente o incompleto',
            ],
            [
                'nombre' => 'Adeudo',
                'descripcion' => 'No se realizó el pago',
            ],

        ];
        foreach ($fill as $fills){
            EstadoPago::create($fills);
        }
    }
}
