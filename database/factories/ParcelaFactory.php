<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Parcela>
 */
class ParcelaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'idUsu' => fake()->numberBetween(1,15),
            'idCult' => fake()->numberBetween(1,8),
            'tamPar' => fake()->randomDigit(40),
            'locPar' => fake()->streetAddress(),
        ];
    }
}
?>