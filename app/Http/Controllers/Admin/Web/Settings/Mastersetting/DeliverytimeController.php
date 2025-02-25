<?php

namespace App\Http\Controllers\Admin\Web\Settings\Mastersetting;

use App\Http\Controllers\Controller;

class DeliverytimeController extends Controller
{
    public function deliverytime()
    {
        return view('admin.settings.mastersetting.deliverytime.deliverytime');
    }
}
