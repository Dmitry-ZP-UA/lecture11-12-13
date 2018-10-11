<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ImagesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('images')->insert([
            [
                'product_id' => 1,
                'src' => 'product1.jpg'
            ],
            [
                'product_id' => 2,
                'src' => 'product2.jpg'
            ],
            [
                'product_id' => 3,
                'src' => 'product3.jpg'
            ],
            [
                'product_id' => 4,
                'src' => 'product4.jpg'
            ],
        ]);
    }
}
