<?php

namespace Database\Factories;


use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Patient>
 */
class PatientFactory extends Factory
{

    
    public function definition()
    {
        return [
            'cin' => fake()->numerify('########'),
            'nom' => fake()->lastName,
            'prenom' => fake()->firstName,
            'num_tel' => fake()->phoneNumber,
            'genre' => fake()->randomElement(['Homme', 'Femme']),
            'date_naissance' => fake()->dateTimeBetween('-80 years', '-18 years'),
        ];
    }
}
