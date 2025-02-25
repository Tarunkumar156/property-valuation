<?php

namespace App\Http\Controllers\Admin\Web\Settings\Generalsetting;

use App\Http\Controllers\Controller;

class FcmsettingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function fcmsetting()
    {
        return view('admin.settings.generalsetting.fcmsetting.fcmsetting');
    }
}
