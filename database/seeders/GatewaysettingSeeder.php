<?php

namespace Database\Seeders;

use App\Models\Admin\Settings\Generalsettings\Gatewaysetting;
use Illuminate\Database\Seeder;

class GatewaysettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $gatewaysetting = [
            [
                'gateway_name' => 'Razorpay',
                'gateway_username' => 'edfish_razorpay',
                'gateway_secret_key' => 'rzp_test_L3jTf15hBzroY3',
                'gateway_publisher_key' => 'Bcw42ir8kkX8nc88e1aW2WU4',
                'is_default' => true,
            ],
            [
                'gateway_name' => 'Instamojo',
                'gateway_username' => 'edfish_instamojo',
                'gateway_secret_key' => 'dsdSDCCascedcweEACdwd$#FasascascQW@!#$!@$!@!@CZCSDCABE',
                'gateway_publisher_key' => '845513182ascascwdvbrnyteqvfverAStt',
                'is_default' => false,
            ],
        ];

        foreach ($gatewaysetting as $row) {
            Gatewaysetting::create($row);
        }
    }
}
