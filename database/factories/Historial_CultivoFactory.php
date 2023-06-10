<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class Historial_CultivoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'idPar' => fake()->numberBetween(1,25),
            'idCult' => fake()->numberBetween(1,8),
            'fechaCult' => fake()->date(),
        ];
    }
}
