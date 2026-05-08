<?php

namespace Database\Seeders;

use App\Models\Raza;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RazaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $fill = [
            [
                'nombre' => 'Husky',
                'especie' => '1',
                'observaciones' => '',
            ],
            [
                'nombre' => 'Pug',
                'especie' => '1',
                'observaciones' => '',
            ],
            [
                'nombre' => 'Poodle',
                'especie' => '1',
                'observaciones' => '',
            ],
            [
                'nombre' => 'Pastor alemán',
                'especie' => '1',
                'observaciones' => '',
            ],
            [
                'nombre' => 'Pastor belga',
                'especie' => '1',
                'observaciones' => '',
            ],
            [
                'nombre' => 'Pomerania',
                'especie' => '1',
                'observaciones' => '',
            ],
            [
                'nombre' => 'San bernardo',
                'especie' => '1',
                'observaciones' => '',
            ],
            [
                'nombre' => 'Schnauzer',
                'especie' => '1',
                'observaciones' => '',
            ],
            [
                'nombre' => 'Shih tzu',
                'especie' => '1',
                'observaciones' => '',
            ],
            [
                'nombre' => 'Yorkie',
                'especie' => '1',
                'observaciones' => '',
            ],
            [
                'nombre' => 'Pitbull',
                'especie' => '1',
                'observaciones' => '',
            ],
            [
                'nombre' => 'Alaska malamute',
                'especie' => '1',
                'observaciones' => '',
            ],
            [
                'nombre' => 'Antiguo pastor inglés',
                'especie' => '1',
                'observaciones' => '',
            ],
            [
                'nombre' => 'Basset hound',
                'especie' => '1',
                'observaciones' => '',
            ],
            [
                'nombre' => 'Beagle',
                'especie' => '1',
                'observaciones' => '',
            ],
            [
                'nombre' => 'Bulldog',
                'especie' => '1',
                'observaciones' => '',
            ],
            [
                'nombre' => 'Chihuahua',
                'especie' => '1',
                'observaciones' => '',
            ],
            [
                'nombre' => 'Cocker spaniel',
                'especie' => '1',
                'observaciones' => '',
            ],
            [
                'nombre' => 'Dachshund',
                'especie' => '1',
                'observaciones' => '',
            ],
            [
                'nombre' => 'Golden retriver',
                'especie' => '1',
                'observaciones' => '',
            ],
            [
                'nombre' => 'Gran danés',
                'especie' => '1',
                'observaciones' => '',
            ],
            [
                'nombre' => 'Labrador',
                'especie' => '1',
                'observaciones' => '',
            ],
            [
                'nombre' => 'Maltés',
                'especie' => '1',
                'observaciones' => '',
            ],
            [
                'nombre' => 'Mestizo',
                'especie' => '1',
                'observaciones' => '',
            ],
            [
                'nombre' => 'Otro',
                'especie' => '1',
                'observaciones' => '',
            ],
            [
                'nombre' => 'Calicó',
                'especie' => '2',
                'observaciones' => '',
            ],            [
                'nombre' => 'Persa',
                'especie' => '2',
                'observaciones' => '',
            ],
            [
                'nombre' => 'Siamés',
                'especie' => '2',
                'observaciones' => '',
            ],
            [
                'nombre' => 'Siberiano',
                'especie' => '2',
                'observaciones' => '',
            ],
            [
                'nombre' => 'Himalayo',
                'especie' => '2',
                'observaciones' => '',
            ],
            [
                'nombre' => 'Mestizo',
                'especie' => '2',
                'observaciones' => '',
            ],
            [
                'nombre' => 'Otro',
                'especie' => '2',
                'observaciones' => '',
            ],
        ];
        foreach ($fill as $fills){
            Raza::create($fills);
        }
    }
}
