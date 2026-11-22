<?php

namespace Database\Factories;

use App\Models\Inventario;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Inventario>
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
            //
            'codigo'=>fake()->unique()->numerify('###'),
            'nombre'=>fake()->words(3, true),
            'precio'=>fake()->randomFloat(2,10,5000),
            'existencias'=>fake()->numberBetween(0, 100)
        ];
    }
}
