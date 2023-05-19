<?php

namespace Database\Seeders;

use App\Models\Office;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class OfficeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $offices = [
            [
              'name' => 'Siège social de Cookmaster',
              'description' => 'Premiers locaux de Cookmaster',
              'address' => '18 rue des Blancs Manteaux',
              'postal_code' => '75004',
              'city' => 'Paris',
              'country' => 'France',
              'number_of_rooms' => '10',
            ],
            [
                'name' => 'Locaux Bourse',
                'description' => 'Seconds locaux de Cookmaster',
                'address' => '12 rue Réaumur',
                'postal_code' => '75002',
                'city' => 'Paris',
                'country' => 'France',
                'number_of_rooms' => '6',
            ],
            [
                'name' => 'Locaux Temple',
                'description' => 'Troisièmes locaux de Cookmaster',
                'address' => '54 rue du Temple',
                'postal_code' => '75003',
                'city' => 'Paris',
                'country' => 'France',
                'number_of_rooms' => '4',
            ],
            [
                'name' => 'Locaux Monge',
                'description' => 'Quatrièmes locaux de Cookmaster',
                'address' => '1 rue Monge',
                'postal_code' => '75005',
                'city' => 'Paris',
                'country' => 'France',
                'number_of_rooms' => '5',
            ],
            [
                'name' => 'Locaux Diderot',
                'description' => 'Cinquièmes locaux de Cookmaster',
                'address' => '134 bd Diderot',
                'postal_code' => '75012',
                'city' => 'Paris',
                'country' => 'France',
                'number_of_rooms' => '8',
            ]
        ];

        foreach ($offices as $office){
            Office::factory()->create($office);
        }
    }
}
