<?php

namespace Database\Seeders;

use App\Models\Admin\Settings\Mastersetting\Deliverytime;
use Illuminate\Database\Seeder;

class DeliverytimeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Deliverytime::create([
            'id' => 1,
            'name' => 'Upto 24 hours',
            'user_id' => 1,
        ]);

        Deliverytime::create([
            'id' => 2,
            'name' => 'Upto 3 days',
            'user_id' => 1,
        ]);

        Deliverytime::create([
            'id' => 3,
            'name' => 'Upto 5 days',
            'user_id' => 1,
        ]);

        Deliverytime::create([
            'id' => 4,
            'name' => 'Any',
            'user_id' => 1,
        ]);
    }
}
