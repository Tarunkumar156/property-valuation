<?php

namespace App\Http\Controllers\Admin\Web\Settings\Generalsetting;

use App\Http\Controllers\Controller;

class EmailsettingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function emailsetting()
    {
        return view('admin.settings.generalsetting.emailsetting.emailsetting');
    }

}
