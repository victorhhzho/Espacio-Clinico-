<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\EstadoNotificaciones;
use App\Models\MetodoPago;
use App\Models\Paciente;
use App\Models\Servicio;
use App\Models\TipoConsulta;
use App\Models\TipoNotificaciones;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            UserSeeder::class
        ]);
        $this->call([
            TipoNotificacionesSeeder::class
        ]);

        $this->call([
            EstadoNotificacionesSeeder::class
        ]);

        $this->call([
            NotificacionesSeeder::class
        ]);

        $this->call([
            SexoSeeder::class
        ]);

        $this->call([
            EspecieSeeder::class
        ]);

        $this->call([
            RazaSeeder::class
        ]);

        $this->call([
            TipoArticuloSeeder::class
        ]);

        $this->call([
            ProveedorSeeder::class
        ]);
        
        $this->call([
            InventarioSeeder::class
        ]);
        $this->call([
            TipoConsultaSeeder::class
        ]);
        $this->call([
            ServicioSeeder::class
        ]);
        $this->call([
            MetodoPagoSeeder::class
        ]);
        $this->call([
            EstadoPagoSeeder::class
        ]);
        $this->call([
            PacienteSeeder::class
        ]);
        $this->call([
            EventSeeder::class
        ]);
        $this->call([
            VentaSeeder::class
        ]);
        $this->call([
            ConsultaSeeder::class
        ]);
        
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
