<?php

namespace Database\Factories;


use App\Models\Corso;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Attivita>
 */
class AttivitaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $giorni=["Lunedì", "Martedì", "Mercoledì","Giovedì","Venerdì"];
        $minuti = ["00","30"];
        $ora = sprintf('%02d:%02d',rand(8, 20),$minuti[array_rand($minuti)]);
        $sala = rand(1,9);
        $corso = Corso::get()->random();
        return [
            "nome"=>fake()->unique()->text(15),
            "descrizione"=>fake()->unique()->text(200),
            'ora'=>$ora,
            'giorno'=>fake()->randomElement($giorni),
            "sala"=>$sala,
            "corso_id"=> $corso->id,           
        ];
    }
}
