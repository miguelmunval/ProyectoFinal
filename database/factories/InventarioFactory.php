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
            'idUsu' => 1,
            'idObj' => fake()->numberBetween(1,10),
            'Cantidad'=> fake()->randomDigit(5),
            'FechComp'=> fake()->date(),
        ];
    }
}
