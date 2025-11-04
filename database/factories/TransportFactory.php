<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class TransportFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
       $min = fake()->numberBetween(1, 100);      // rango mínimo
        $max = fake()->numberBetween($min + 1, 500); // max siempre mayor que min

        return [
            'min'     => $min,
            'max'     => $max,
            'price'   => fake()->numberBetween(5, 1000), // precio como int
            'deleted' => 0,                              // por defecto no eliminado
        ];
    }

}
