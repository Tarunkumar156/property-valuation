<?php

namespace App\Http\Controllers\Admin\Web\Settings\Termsandsupport;

use App\Http\Controllers\Controller;

class SupportController extends Controller
{
    public function support()
    {
        return view('admin.settings.termsandsupport.support');
    }
}
