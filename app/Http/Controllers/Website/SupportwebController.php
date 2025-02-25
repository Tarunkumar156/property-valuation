<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Models\Admin\Settings\Termsandsupport\Support;

class SupportwebController extends Controller
{
    public function customertermsandcondition()
    {
        $support = Support::where('panel', 'CUSTOMER')->where('type', 1)->select('description')->first();
        return view('website.support.support', compact('support'));
    }

    public function customerfaq()
    {
        $support = Support::where('panel', 'CUSTOMER')->where('type', 2)->select('description')->first();
        return view('website.support.support', compact('support'));
    }

    public function customercontactus()
    {
        $support = Support::where('panel', 'CUSTOMER')->where('type', 3)->select('description')->first();
        return view('website.support.support', compact('support'));
    }

}
