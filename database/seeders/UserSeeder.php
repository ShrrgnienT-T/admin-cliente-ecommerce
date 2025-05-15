<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Cria 50 usuários de teste, cada um com role comprador
        \App\Models\User::factory(50)->create()->each(function ($user) {
            $user->assignRole('comprador');
        });

        // Cria o super admin
        $admin = User::create([
            'name' => 'Administrador',
            'email' => 'admin@teste.com',
            'email_verified_at' => now(),
            'created_at' => now(),
            'password' => Hash::make('12345678'),
        ]);
        $admin->assignRole('admin');

        // Cria um usuário comprador para teste
        $user = User::create([
            'name' => 'Usuário',
            'email' => 'user@teste.com',
            'email_verified_at' => now(),
            'created_at' => now(),
            'password' => Hash::make('password'),
        ]);
        $user->assignRole('comprador');
    }
}
