<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Animal;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Animal>
 */
class AnimalFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

     protected $model = Animal::class;

    public function definition()
    {
        return [
            'id_usu' => null,
            'nombre' => $this->faker->word,
            'adoptado' => $this->faker->boolean,
            'foto' => $this->faker->text()
        ];
    }
}
