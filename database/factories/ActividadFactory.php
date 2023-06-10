<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class ActividadFactory extends Factory
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
            'idTra' => fake()->numberBetween(1,3),
            'desAct'=> fake()->sentence,
        ];
    }
}
