<?php

namespace Database\Seeders;

use App\Models\Inventario;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class InventarioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $inventario = [
            [
                'articulo' => 'Suturas',
                'proveedor' => '3',
                'tipo' => '5',
                'descripcion' => 'Para cirugias', 
                'unidades' => '10',
                'unidades_min' => '4',
                'precio_vet' => '100',
                'precio_pub' => '300',
            ],
            [
                'articulo' => 'Vacuna Quintuple',
                'proveedor' => '3',
                'tipo' => '3',
                'descripcion' => 'Cuadro de vacunacion perro', 
                'unidades' => '4',
                'unidades_min' => '4',
                'precio_vet' => '50',
                'precio_pub' => '150',
            ],
            [
                'articulo' => 'Sucralfato',
                'proveedor' => '2',
                'tipo' => '1',
                'descripcion' => 'Para controlar la acidez', 
                'unidades' => '5',
                'unidades_min' => '3',
                'precio_vet' => '60',
                'precio_pub' => '120',
            ],
            [
                'articulo' => 'Gasas Esteriles',
                'proveedor' => '4',
                'tipo' => '2',
                'descripcion' => 'Para curaciones o cirugias', 
                'unidades' => '2',
                'unidades_min' => '3',
                'precio_vet' => '70',
                'precio_pub' => '160',
            ],
        ];
        foreach ($inventario as $inventarios){
            Inventario::create($inventarios);
        }
    }
}
