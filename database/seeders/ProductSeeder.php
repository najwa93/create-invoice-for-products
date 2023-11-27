<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create Dummy Products Array
        $products = [
            [
                'item_type' => 'T-shirt',
                'item_price' => '30.99',
                'country_id' => 1,
                'weight' => 0.2,
            ],
            [
                'item_type' => 'Blouse',
                'item_price' => '10.99',
                'country_id' => 2,
                'weight' => 0.3,
            ],
            [
                'item_type' => 'Pants',
                'item_price' => '64.99',
                'country_id' => 2,
                'weight' => 0.9,
            ],
            ['item_type' => 'Sweatpants',
                'item_price' => '84.99',
                'country_id' => 3,
                'weight' => 1.1,
            ],
            [
                'item_type' => 'Jacket',
                'item_price' => '199.99',
                'country_id' => 1,
                'weight' => 2.2,
            ],
            [
                'item_type' => 'Shoes',
                'item_price' => '79.99',
                'country_id' => 3,
                'weight' => 1.3,
            ]
        ];

        foreach ($products as $product) {
            Product::create($product);
        }
    }
}
