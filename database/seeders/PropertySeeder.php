<?php

namespace Database\Seeders;

use App\Models\Property;
use Illuminate\Database\Seeder;

class PropertySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $properties = [
            [
                'name' => 'Villa avec vue sur mer',
                'description' => 'Magnifique villa avec vue panoramique sur la mer. Parfait pour des vacances en famille ou entre amis.',
                'price_per_night' => 250.00,
            ],
            [
                'name' => 'Appartement en centre-ville',
                'description' => 'Bel appartement situé en plein cœur de la ville, proche de toutes commodités.',
                'price_per_night' => 120.00,
            ],
            [
                'name' => 'Chalet en montagne',
                'description' => 'Chalet confortable au pied des pistes. Idéal pour les amateurs de ski et de randonnée.',
                'price_per_night' => 180.00,
            ],
        ];

        foreach ($properties as $property) {
            Property::create($property);
        }
    }
}
