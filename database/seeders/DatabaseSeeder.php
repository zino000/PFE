<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\service;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        User::factory()->count(1)->create();
        $examples = [[
            'nom' => 'Implants dentaires',
            'prix' => 1700,
            ],
            [
            'nom' => 'Extraction de dents',
            'prix' => 200,
            ],
            [
            'nom' => 'Blanchiment de dents',
            'prix' => 500,
            ],
            [
            'nom' => 'Nettoyages dentaires',
            'prix' => 300,
            ],
            [
            'nom' => 'Traitment de la douleur',
            'prix' => 1700,
            ],
            [
            'nom' => 'Orthodontie',
            'prix' => 8000,
            ],];
        foreach($examples as $example){
            Service::create($example);
        }
    }
}
