<?php

namespace App\Http\Controllers\Admin\Web\Customer;

use App\Http\Controllers\Controller;

class CustomerController extends Controller
{
    public function customer()
    {
        return view('admin.customer.index');
    }
}
