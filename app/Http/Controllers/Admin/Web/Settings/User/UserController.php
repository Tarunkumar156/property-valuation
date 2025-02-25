<?php

namespace App\Http\Controllers\Admin\Web\Settings\User;

use App\Http\Controllers\Controller;

class UserController extends Controller
{
    public function usercreateoredit()
    {
        return view('admin.settings.user.user.usercreateoredit');
    }

    public function userchangepassword()
    {
        return view('admin.settings.user.changepassword.userchangepassword');
    }

    public function userrole()
    {
        return view('admin.settings.user.role.userrole');
    }
}
