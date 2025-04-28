<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Equipo>
 */
class EquipoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected static array $nombresUnicos = [
        'Real Madrid CF',
        'FC Barcelona',
        'Atlético de Madrid',
        'Sevilla FC',
        'Real Betis Balompié',
        'Athletic Club',
        'Real Sociedad',
        'Valencia CF',
        'Villarreal CF',
        'Rayo Vallecano',
        'Getafe CF',
        'Celta de Vigo',
        'CA Osasuna',
        'UD Las Palmas',
        'Deportivo Alavés',
        'Granada CF',
        'RCD Mallorca',
        'Cádiz CF',
        'Girona FC',
        'UD Almería',
        'Arsenal FC',
        'Aston Villa FC',
        'Bournemouth AFC',
        'Brentford FC',
        'Brighton & Hove Albion',
        'Chelsea FC',
        'Crystal Palace FC',
        'Everton FC',
        'Fulham FC',
        'Leeds United',
        'Leicester City FC',
        'Liverpool FC',
        'Manchester City',
        'Manchester United',
        'Newcastle United',
        'Nottingham Forest FC',
        'Southampton FC',
        'Tottenham Hotspur',
        'West Ham United',
        'Wolverhampton Wanderers',
    ];

    public function definition(): array
    {
        return [
            'nombre' => array_shift(self::$nombresUnicos),
            'siglas' => fake()->bothify('???'), // Ej: FCB, RMA, PSG
            'ciudad' => fake()->city(),
            'pais' => fake()->country(),
            'anioFundacion' => fake()->numberBetween(1900, 2024),
            'user_id' => fake()->numberBetween(1, User::all()->count()),
        ];
    }
}

/**
 * $table->string('nombre')->unique();
 * $table->string('siglas');
 * $table->string('ciudad');
 * $table->string('pais');
 * $table->integer('anioFundacion');
 * $table->unsignedBigInteger('user_id');
 */
