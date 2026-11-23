<?php

namespace Database\Factories;

use App\Models\Equipo;
use Illuminate\Database\Eloquent\Factories\Factory;

class EquipoFactory extends Factory
{
    public function definition(): array
    {
        return [
            'codigo' => fake()->unique()->bothify('EQP-####'),
            'nombre' => rtrim(fake()->sentence(4), '.'),
            'marca' => rtrim(fake()->sentence(4), '.'),
            'fecha_adquisicion' => fake()->dateTimeBetween('-250000 days', 'now')->format('Y-m-d'),
            'estado' => fake()->randomElement(Equipo::ESTADOS),
        ];
    }
}