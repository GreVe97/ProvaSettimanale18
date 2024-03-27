<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Corso>
 */
class CorsoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            "nome"=>fake()->unique()->text(15),
            "descrizione"=>fake()->unique()->text(200),
            "istruttore"=>fake()->name(),
        ];
    }
}
