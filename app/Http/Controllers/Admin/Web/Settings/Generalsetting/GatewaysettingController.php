<?php

namespace App\Http\Controllers\Admin\Web\Settings\Generalsetting;

use App\Http\Controllers\Controller;

class GatewaysettingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function gatewaysetting()
    {
        return view('admin.settings.generalsetting.gatewaysetting.gatewaysetting');
    }

}
