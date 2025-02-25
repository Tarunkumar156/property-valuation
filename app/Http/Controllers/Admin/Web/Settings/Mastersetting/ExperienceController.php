<?php

namespace App\Http\Controllers\Admin\Web\Settings\Mastersetting;

use App\Http\Controllers\Controller;

class ExperienceController extends Controller
{
    public function experience()
    {
        return view('admin.settings.mastersetting.experience.experience');
    }
}
