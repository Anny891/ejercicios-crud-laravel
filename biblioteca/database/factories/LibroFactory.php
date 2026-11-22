<?php

namespace Database\Factories;

use App\Models\Libro;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Libro>
 */
class LibroFactory extends Factory
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
            'codigo' => fake()->unique()->numerify('LIB-########'),
            'titulo' => fake()->words(4, true),
            'autor' => fake()->name(),
            'anio_publicacion' => fake()->numberBetween(1450, 2026),
        ];
    }
}
