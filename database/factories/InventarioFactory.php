<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class InventarioFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'idUsu' => fake()->numberBetween(1,15),
            'idObj' => fake()->numberBetween(1,3),
            'Cantidad'=> fake()->randomDigit(5),
            'FechComp'=> fake()->date(),
        ];
    }
}
