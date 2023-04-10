<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\RendezVous>
 */

class RendezVousFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    

    public function definition()
    {

        return [
            'cin' => fake()->numerify('########'),
            'date_rdv' => fake()->dateTimeBetween('now', '+1 month')->format('Y-m-d'),
            'temp_dep' => fake()->randomElement(["09:00:00","09:30:00","10:00:00",
            "10:30:00",
            "11:00:00",
            "11:30:00",
            "13:00:00",
            "13:30:00",
            "14:00:00",
            "14:30:00",
            "15:00:00",
            "15:30:00",
            "16:00:00",
            "16:30:00"]),
            'nom' => fake()->lastName,
            'prenom' => fake()->firstName,
            'genre' => fake()->randomElement(['Homme', 'Femme']),
            'num_tel' => fake()->phoneNumber,
            'date_naissance' => fake()->dateTimeBetween('-80 years', '-10 years')->format('Y-m-d'),
            'id_ser' => rand(1, 6),
        ];
    }
}
