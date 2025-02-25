<?php

namespace App\Http\Controllers\Admin\Web\Settings\Mastersetting;

use App\Http\Controllers\Controller;

class LocationController extends Controller
{
    public function location()
    {
        return view('admin.settings.mastersetting.location.location');
    }
}
