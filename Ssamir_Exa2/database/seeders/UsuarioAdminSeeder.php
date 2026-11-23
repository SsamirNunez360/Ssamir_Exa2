<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsuarioAdminSeeder extends Seeder
{
    public function run(): void
    {
        if (! User::where('usuario', 'admin')->exists()) {
            $usuario = new User();
            $usuario->name = 'Administrador';
            $usuario->usuario = 'admin';
            $usuario->password = Hash::make('12345678');
            $usuario->save();
        }
    }
}