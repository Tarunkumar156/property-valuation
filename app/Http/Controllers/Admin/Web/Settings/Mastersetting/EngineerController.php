<?php

namespace App\Http\Controllers\Admin\Web\Settings\Mastersetting;

use App\Http\Controllers\Controller;

class EngineerController extends Controller
{
    public function engineer()
    {
        return view('admin.settings.mastersetting.engineer.engineer');
    }
}
