<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Cultivo>
 */
class CultivoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nomCult' => fake()->word,
            'DesCult' => fake()->word,
            'EstSiem' => fake()->word,
            'EstCos' => fake()->word,
            'ZonaCult' => fake()->country,
        ];
    }
}
