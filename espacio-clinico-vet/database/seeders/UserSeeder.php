<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = [
            [
                'name' => 'admin', 
                'email' => 'gama@gmail.com',
                'password' => '1234',
                'nombre' => 'Martha Amalia',
                'apellido_p' => 'Hernández',
                'apellido_m' => 'Garcia',
                'cedula' => '123342134',
            ],
            [
                'name' => 'vic', 
                'email' => 'victor@gmail.com',
                'password' => '123',
                'nombre' => 'Victor',
                'apellido_p' => 'Hernández',
                'apellido_m' => 'Hurtado',
                'cedula' => '123456677',
            ],
            [
                'name' => 'isa', 
                'email' => 'blancubis@gmail.com',
                'password' => '123',
                'nombre' => 'Isabel',
                'apellido_p' => 'Hernández',
                'apellido_m' => 'Hurtado',
                'cedula' => '141212377',
            ],
        ];
        foreach ($users as $users){
            User::create($users);
        }
    }
}