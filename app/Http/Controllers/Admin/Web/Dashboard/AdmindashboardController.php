<?php

namespace App\Http\Controllers\Admin\Web\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Admin\Valuation\Valuation;
use App\Models\Customer\Auth\Customer;

class AdmindashboardController extends Controller
{
    public function dashboard()
    {
        $customer = Customer::count();
        $valuation = Valuation::count();

        return view('admin.dashboard.admindashboard', compact('customer', 'valuation'));
    }

}
