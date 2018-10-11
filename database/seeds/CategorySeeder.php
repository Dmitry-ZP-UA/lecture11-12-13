<?php

use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{

    public function run()
    {
        DB::table('categories')->insert([
            [
                'parent_id' => 1,
                'name' => 'Category 1',
                'slug' => 'Category_1',
                'description' => 'Description category 1',
            ],
            [
                'parent_id' => 2,
                'name' => 'Category 2',
                'slug' => 'Category_2',
                'description' => 'Description category 2',
            ],
            [
                'parent_id' => 3,
                'name' => 'Category 3',
                'slug' => 'Category_3',
                'description' => 'Description category 3',
            ],
            [
                'parent_id' => 4,
                'name' => 'Category 4',
                'slug' => 'Category_4',
                'description' => 'Description category 4',
            ]

    ]);
    }
}
