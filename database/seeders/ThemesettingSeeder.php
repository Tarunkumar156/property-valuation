<?php

namespace Database\Seeders;

use App\Models\Admin\Settings\Generalsettings\Themesetting;
use Illuminate\Database\Seeder;

class ThemesettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Themesetting::create([
            'theme_name' => 'Teal',
            'path' => 'theme/tealtheme.css',
            'collapse_active_color' => '#0097a7',
            'collapse_activesub_color' => '#0097a7',
            'is_default' => false,
        ]);

        Themesetting::create([
            'theme_name' => 'Blue',
            'path' => 'theme/bluetheme.css',
            'collapse_active_color' => '#05257e',
            'collapse_activesub_color' => '#05257e',
            'is_default' => true,
        ]);
    }
}
