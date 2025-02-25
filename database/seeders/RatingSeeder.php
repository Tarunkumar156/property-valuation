<?php

namespace Database\Seeders;

use App\Models\Admin\Settings\Mastersetting\Rating;
use Illuminate\Database\Seeder;

class RatingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Rating::create([
            'id' => 1,
            'name' => 'Top Rated',
            'user_id' => 1,
        ]);
        Rating::create([
            'id' => 2,
            'name' => 'Level Two',
            'user_id' => 1,
        ]);
        Rating::create([
            'id' => 3,
            'name' => 'Level One',
            'user_id' => 1,
        ]);
    }
}
