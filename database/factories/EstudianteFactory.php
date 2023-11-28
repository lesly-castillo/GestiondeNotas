<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Estudiante>
 */
class EstudianteFactory extends Factory
{
  
    public function definition(): array
    {
        return [
            'nombre'=>fake()->firstname(),
            'apellido'=>fake()->lastname(),
            'correo_electronico'=>fake()->email(),
            'nombre_usuario'=>fake()->email(),
            'telefono'=>fake()->numerify('########'), 

        ];
    }
}
