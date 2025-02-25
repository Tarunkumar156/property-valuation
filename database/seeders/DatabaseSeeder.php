<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UserSeeder::class);

        $this->call(EmailsettingSeeder::class);
        $this->call(FcmsettingSeeder::class);
        $this->call(GatewaysettingSeeder::class);
        $this->call(GeneralsettingSeeder::class);
        $this->call(SmssettingSeeder::class);
        $this->call(ThemesettingSeeder::class);

        $this->call(CategorySeeder::class);
        $this->call(DeliverytimeSeeder::class);
        $this->call(ExperienceSeeder::class);
        $this->call(LocationSeeder::class);
        $this->call(RatingSeeder::class);

        $this->call(SupportSeeder::class);

    }
}
