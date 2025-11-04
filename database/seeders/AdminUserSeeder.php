<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AdminUserSeeder extends Seeder
{
    /**
     * Ejecutar el seeder para crear usuario administrador
     */
    public function run(): void
    {
        // Verificar si el usuario administrador ya existe
        if (!User::where('email', 'admin@admin.com')->exists()) {
            User::create([
                'firstname' => 'Admin',
                'secondname' => 'User',
                'email' => 'admin@admin.com',
                'password' => bcrypt('12345678'),
                'company_id' => 1, // Asumiendo que existe una compañía con ID 1
                'type' => 'A', // A = Administrador
                'email_confirmed' => true,
                'activated' => true,
                'iscontact' => false,
                'deleted' => false,
            ]);
            
            $this->command->info('Usuario administrador creado exitosamente!');
            $this->command->info('Email: admin@admin.com');
            $this->command->info('Password: 12345678');
        } else {
            $this->command->info('El usuario administrador ya existe.');
        }
    }
}