<?php

namespace Database\Seeders;

use App\Models\Admin\Settings\Generalsettings\Generalsetting;
use Illuminate\Database\Seeder;

class GeneralsettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Generalsetting::create([
            'companyfullname' => '8Queens Software Development Company',
            'companyshortname' => '8Queens Software',
            'address' => 'No. 9/3, 3rd Floor, VK Road, Chennai-600028',
            'phone' => '+91 4423 2265',
            'email' => 'vimalraj@8queens.com',
            'language' => 1,

            'logo' => '',
            'favicon' => '',
        ]);
    }
}
