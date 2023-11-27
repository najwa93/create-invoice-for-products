<?php

namespace Database\Seeders;

use App\Models\Country;
use Illuminate\Database\Seeder;

class CountrySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create Dummy Country Array
        $countries = [
            [
                'country' => 'US',
                'rate' => 2,
            ],
            [
                'country' => 'UK',
                'rate' => 3,
            ],
            [
                'country' => 'CN',
                'rate' => 2,
            ]
        ];

        foreach ($countries as $country) {
            Country::create($country);
        }
    }
}
