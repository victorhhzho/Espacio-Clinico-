<?php

namespace Database\Seeders;

use App\Models\Event;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EventSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $event = [
            [
                'event' => 'Consulta',
                'start_date' => '2023-08-26 10:00',
                'end_date' => '2023-08-26 12:30',
                'paciente' => '1',
            ],
            [
                'event' => 'Estética',
                'start_date' => '2023-08-30 10:30',
                'end_date' => '2023-08-30 11:00',
                'paciente' => '1',
            ],
        ];
        foreach ($event as $events){
            Event::create($events);
        }
    }
}
