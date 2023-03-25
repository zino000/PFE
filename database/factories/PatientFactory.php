<?php

namespace Database\Factories;


use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Patient>
 */
class PatientFactory extends Factory
{
    protected $model = Flight::class;
    
    public function definition()
    {
        return [
            'NOM' => $faker->lastName,
            'PRENOM' => $faker->firstName,
            'GENRE' => $faker->randomElement(['Homme', 'Femme']),
            'DATE_NAISSANCE' => $faker->dateTimeBetween('-80 years', '-18 years'),
        ];
    }
}
