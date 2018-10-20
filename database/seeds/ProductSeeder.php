<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('products')->insert([
            [
                'category_id' => 1,
               'name' => 'Product 1',
               'slug' => 'Product_1',
               'description' => 'Description Product 1',
               'price' => 100,
               'status' => 1,
               'quantity' => 20
            ],
            [
                'category_id' => 2,
                'name' => 'Product 2',
                'slug' => 'Product_2',
                'description' => 'Description Product 2',
                'price' => 150,
                'status' => 1,
                'quantity' => 200
            ],
            [
                'category_id' => 3,
                'name' => 'Product 3',
                'slug' => 'Product_3',
                'description' => 'Description Product 3',
                'price' => 1200,
                'status' => 1,
                'quantity' => 202
            ],
            [
                'category_id' => 4,
                'name' => 'Product 4',
                'slug' => 'Product_4',
                'description' => 'Description Product 4',
                'price' => 169,
                'status' => 1,
                'quantity' => 288
            ]

    ]);
    }
}
