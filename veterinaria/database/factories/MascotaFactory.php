<?php

namespace Database\Factories;

use App\Models\Mascota;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Mascota>
 */
class MascotaFactory extends Factory
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
            'nombre'=>fake()->name(),
            'especie'=>fake()->randomElement(['gato', 'perro', 'ave']),
            'propietario'=>fake()->name(),
            'fecha_nacimiento'=>fake()->date()
        ];
    }
}
