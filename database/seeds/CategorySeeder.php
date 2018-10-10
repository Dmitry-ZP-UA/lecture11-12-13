<?php

use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{

    public function run()
    {
        DB::table('categories')->insert([
            'parent_id' => 1,
            'name' => 'Category 1',
            'slug' => 'Category_1',
            'description' => 'Description category 1',
        ]);
    }
}
