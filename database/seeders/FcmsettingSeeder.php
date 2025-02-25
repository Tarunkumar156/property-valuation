<?php

namespace Database\Seeders;

use App\Models\Admin\Settings\Generalsettings\Fcmsetting;
use Illuminate\Database\Seeder;

class FcmsettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Fcmsetting::create([
            "email" => "admin@gmail.com",
            "serverkey" => "AAAA8pGeMgM:APA91bHURwwhx6WJgVeeArQYDY3vB3rhwjjh29VIu3lTkq3wtjfpYmx695Pnp3_MpmiEsGrmIOhjThdZFfWg8wsxqc3fYqbKAdJiGlobWJEc0565eBhYw4T6cAk3rwWW7S_TjwVB0pzg",
            "is_default" => true,
        ]);
    }
}
