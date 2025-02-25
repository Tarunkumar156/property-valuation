<?php

namespace Database\Seeders;

use App\Models\Admin\Settings\Mastersetting\Experience;
use Illuminate\Database\Seeder;

class ExperienceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Experience::create([
            'id' => 1,
            'name' => 'Top Rated Professional',
            'user_id' => 1,
        ]);

        Experience::create([
            'id' => 2,
            'name' => 'Professional',
            'user_id' => 1,
        ]);

        Experience::create([
            'id' => 3,
            'name' => 'Amateur',
            'user_id' => 1,
        ]);
    }
}
