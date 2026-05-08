<?php

namespace Database\Seeders;

use App\Models\MetodoPago;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MetodoPagoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $fill = [
            [
                'nombre' => 'Efectivo',
                'descripcion' => 'Pago con efectivo',
            ],
            [
                'nombre' => 'Deposito / Transancción',
                'descripcion' => 'Pago por transacción a cuenta de debito',
            ],
            [
                'nombre' => 'Pago con tarjeta',
                'descripcion' => 'Pago con tarjeta de credito.',
            ],

        ];
        foreach ($fill as $fills){
            MetodoPago::create($fills);
        }
    }
}
