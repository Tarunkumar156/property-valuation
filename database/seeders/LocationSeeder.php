<?php

namespace Database\Seeders;

use App\Models\Admin\Settings\Mastersetting\Location;
use Illuminate\Database\Seeder;

class LocationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Location::create([
            'id' => 1,
            'name' => 'Tamil Nadu',
            'user_id' => 1,
        ]);
        Location::create([
            'id' => 2,
            'name' => 'Kerala',
            'user_id' => 1,
        ]);
        Location::create([
            'id' => 3,
            'name' => 'Mumbai',
            'user_id' => 1,
        ]);

    }
}
