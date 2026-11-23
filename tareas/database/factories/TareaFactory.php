<?php

namespace Database\Factories;

use App\Models\Tarea;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Tarea>
 */
class TareaFactory extends Factory
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
            
            'titulo'=>fake()->words(3, true),
            'descripcion'=>fake()->sentence(),
            'responsable'=>fake()->name(),
            'fecha_limite'=>fake()->date(),
            'estado'=>fake()->randomElement(['pendiente','proceso','completada'])
        ];
        
    }
}
