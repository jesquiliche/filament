<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Crear un usuario de ejemplo
        User::create([
            'name' => 'admin',
            'email' => 'admin@test.com',
            'password' => Hash::make('3912481'), // Encriptar la contraseña
        ]);

        // Crear más usuarios si lo deseas
        User::create([
            'name' => 'Jane Smith',
            'email' => 'janesmith@example.com',
            'password' => Hash::make('password456'),
        ]);
    }
}
