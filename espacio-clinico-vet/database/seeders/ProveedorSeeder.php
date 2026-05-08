<?php

namespace Database\Seeders;

use App\Models\Proveedor;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProveedorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $fill = [
            [
                'nombre' => 'Dinavet',
                'direccion' => 'Centro de Querétaro',
                'telefono' => '235622344',
                'observaciones' => 'Son muy rápidos.',
            ],
            [
                'nombre' => 'Avepsa',
                'direccion' => 'Juriquilla',
                'telefono' => '6234235236',
                'observaciones' => 'Tardan en responder.',
            ],
            [
                'nombre' => 'Difarvet',
                'direccion' => 'Santa Rosa Jauregui',
                'telefono' => '2345556623',
                'observaciones' => 'Tienen muchos productos.',
            ],
            [
                'nombre' => 'Pisa',
                'direccion' => 'Avenida 5 de Febrero',
                'telefono' => '2351563212',
                'observaciones' => 'Tienen muchos productos.',
            ],
            [
                'nombre' => 'Panavet',
                'direccion' => 'Centro de Querétaro',
                'telefono' => '4421256164',
                'observaciones' => 'Son muy atentos.',
            ],
        ];
        foreach ($fill as $fills){
            Proveedor::create($fills);
        }
    }
}
