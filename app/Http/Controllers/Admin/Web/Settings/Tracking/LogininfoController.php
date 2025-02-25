<?php

namespace App\Http\Controllers\Admin\Web\Settings\Tracking;

use App\Http\Controllers\Controller;

class LogininfoController extends Controller
{

    public function logininfo()
    {
        return view('admin.settings.tracking.logininfo');
    }

}
