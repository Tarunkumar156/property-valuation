<?php

namespace Database\Seeders;

use App\Models\Admin\Settings\Generalsettings\Smssetting;
use Illuminate\Database\Seeder;

class SmssettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Smssetting::create([
            'provider_name' => 'test',
            'sid' => 'test',
            'sender_id' => 'test',
            'token' => 'test',
            'url' => 'test',
            'country_code' => 'test',
            'phone_no' => '7395944078',
            'is_default' => true,
        ]);
    }
}
