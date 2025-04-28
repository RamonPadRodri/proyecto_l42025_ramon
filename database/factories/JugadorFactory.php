<?php

namespace Database\Factories;

use App\Models\Equipo;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Jugador>
 */
class JugadorFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $posiciones = ['Portero', 'Defensa', 'Centrocampista', 'Delantero'];
        $genero = fake()->randomElement(['male']);

        return [
            'nombre' => fake()->firstName($genero) . ' ' . fake()->firstName($genero) . ' ' . fake()->lastName() . ' ' . fake()->lastName(),
            'codigo' => fake()->unique()->bothify('JUG-###'), // Ej: JUG-183
            'posicion' => fake()->randomElement($posiciones),
            'edad' => fake()->numberBetween(16, 40),
            'pais' => fake()->country(),
            'equipo_id' => fake()->numberBetween(1, Equipo::all()->count()),
        ];
    }
}
