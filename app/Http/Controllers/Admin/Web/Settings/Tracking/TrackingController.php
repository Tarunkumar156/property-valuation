<?php

namespace App\Http\Controllers\Admin\Web\Settings\Tracking;

use App\Http\Controllers\Controller;

class TrackingController extends Controller
{

    public function tracking()
    {
        return view('admin.settings.tracking.tracking');
    }
}
