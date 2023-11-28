<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Nota>
 */
class NotaFactory extends Factory
{
    public function definition(): array
    {
        return [
            'titulo'=>fake()->name(),
            'contenido'=>fake()->text(), 
            'categoria'=>fake()->firstname(),
            'fecha'=>fake()->date(),
            'etiqueta'=>fake()->word(),
            'color'=>fake()->colorName(),
        ];
    }
}
