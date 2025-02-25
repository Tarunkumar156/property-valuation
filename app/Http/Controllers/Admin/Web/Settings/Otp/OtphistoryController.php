<?php

namespace App\Http\Controllers\Admin\Web\Settings\Otp;

use App\Http\Controllers\Controller;

class OtphistoryController extends Controller
{
    public function otphistory()
    {
        return view('admin.settings.otp.otphistory');
    }
}
