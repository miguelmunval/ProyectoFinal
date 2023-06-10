<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Objeto>
 */
class ObjetoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'NomObj' => fake()->word,
            'DesObj' => fake()->sentence,
            'Precio' => fake()->randomFloat(15),
        ];
    }
}
