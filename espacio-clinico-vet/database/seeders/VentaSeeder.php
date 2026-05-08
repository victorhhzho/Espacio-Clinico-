<?php

namespace Database\Seeders;

use App\Models\Venta;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class VentaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $fill = [
            [
                'fecha' => '2023-02-22 10:30',
                'paciente' => '1',
                'servicio'=> '1',
                'descripcion'=> 'Consulta y medicamentos',
                'metodo_pago'=> '1',
                'estado_pago'=> '1',
                'monto'=> '350',
                'adeudo'=> '0',
            ],
        ];
        foreach ($fill as $fills){
            Venta::create($fills);
        }
    }
}
