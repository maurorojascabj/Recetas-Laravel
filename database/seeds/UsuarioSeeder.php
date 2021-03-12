<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\User;

class UsuarioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
            'name' => 'Mauro',
            'email' => 'correo@correo.com',
            'password' => Hash::make('12345678'),
            'url' => 'wwww.maurorojas.com',
        ]);

        $user2 = User::create([
            'name' => 'Anto',
            'email' => 'correo2@correo.com',
            'password' => Hash::make('12345678'),
            'url' => null,
        ]);

        $user3 = User::create([
            'name' => 'Nico',
            'email' => 'correo3@correo.com',
            'password' => Hash::make('12345678'),
            'url' => null,
        ]);
    }
}
