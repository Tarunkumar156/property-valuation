<?php

namespace Database\Seeders;

use App\Models\Admin\Settings\Mastersetting\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::create([
            'id' => 1,
            'name' => 'Building',
            'user_id' => 1,
        ]);
        Category::create([
            'id' => 2,
            'name' => 'Individual House',
            'user_id' => 1,
        ]);
        Category::create([
            'id' => 3,
            'name' => 'Bungalow',
            'user_id' => 1,
        ]);
        Category::create([
            'id' => 4,
            'name' => 'Villa',
            'user_id' => 1,
        ]);
        Category::create([
            'id' => 5,
            'name' => 'Flat',
            'user_id' => 1,
        ]);
        Category::create([
            'id' => 6,
            'name' => 'Commercial Space',
            'user_id' => 1,
        ]);
    }
}
