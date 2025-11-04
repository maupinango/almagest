<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * The current password being used by the factory.
     */
    protected static ?string $password;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'firstname' => fake()->firstName(),
            'secondname' => fake()->lastName(),
            'email' => fake()->unique()->safeEmail(),
            'password' => static::$password ??= Hash::make('password'),
            'company_id' => \App\Models\Company::all()->random()->id,
            'type' => 'U',
            'email_confirmed' => 0,
            'activated' => 0,
            'iscontact' => 0,
            'deleted' => 0,
            'remember_token' => Str::random(10),
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     */
    public function unverified(): static
    {
        return $this->state(fn (array $attributes) => [
            'email_verified_at' => null,
        ]);
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
