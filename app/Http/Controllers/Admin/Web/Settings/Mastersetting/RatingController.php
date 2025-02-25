<?php

namespace App\Http\Controllers\Admin\Web\Settings\Mastersetting;

use App\Http\Controllers\Controller;

class RatingController extends Controller
{
    public function rating()
    {
        return view('admin.settings.mastersetting.rating.rating');
    }
}
