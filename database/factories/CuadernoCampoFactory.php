<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class CuadernoCampoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'idPar' => fake()->numberBetween(1,15),
            'idPro' => fake()->numberBetween(1,8),
            'idTra' => fake()->numberBetween(1,5),
            'fechafitosanitario' => fake()->date(),
        ];
    }
}
