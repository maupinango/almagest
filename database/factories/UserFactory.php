<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;

class UserFactory extends Factory
{
    public function definition(): array
    {
        return [
            'firstname' => $this->faker->firstName(),
            'secondname' => $this->faker->lastName(),
            'email' => $this->faker->unique()->safeEmail(),
            'password' => bcrypt('password'),
            'company_id' => 1,
            'type' => 'U',
            'email_confirmed' => true,
            'activated' => true,
            'iscontact' => false,
            'deleted' => false,
        ];
    }

    /**
     * Crear usuario administrador por defecto
     */
    public function admin(): static
    {
        return $this->state(fn (array $attributes) => [
            'firstname' => 'Admin',
            'secondname' => 'User',
            'email' => 'admin@admin.com',
            'password' => bcrypt('12345678'),
            'type' => 'A',
            'email_confirmed' => true,
            'activated' => true,
        ]);
    }
}