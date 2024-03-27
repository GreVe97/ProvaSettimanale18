<?php

namespace Database\Factories;

use App\Models\Attivita;
use App\Models\Prenotazioni;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Prenotazioni>
 */
class PrenotazioniFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        
        $stato=["in sospeso", "accettata", "rifiutata"];
        return [
            "attivita_id"=> Attivita::pluck('id')->random(),
            "user_id"=> User::pluck('id')->random(),
            "stato"=>fake()->randomElement($stato),

        ];
    }
}
