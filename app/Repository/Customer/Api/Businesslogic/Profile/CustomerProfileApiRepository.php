<?php

namespace App\Repository\Customer\Api\Businesslogic\Profile;

use App\Models\Miscellaneous\Helper;
use App\Repository\Customer\Api\Interfacelayer\Profile\ICustomerProfileApiRepository;
use DB;

class CustomerProfileApiRepository implements ICustomerProfileApiRepository
{

    public function getcustomerprofile()
    {
        $user = auth()->user();
        $data['name'] = $user->name ? $user->name : '';
        $data['phone'] = $user->phone;
        $data['email'] = $user->email ? $user->email : '';
        $data['dob'] = $user->dob ? $user->dob : '';
        return [true, $data, 'Get Customer Profile'];
    }

    public function updatecustomerprofile()
    {
        $customer = auth()->user();
        $customer->update([
            'name' => request('name'),
            'email' => request('email'),
            'dob' => request('dob'),
        ]);

        Helper::trackmessage($customer, $customer, 'customer_api_updatecustomerprofile', substr(request()->header('authorization'), -33), 'API', 'Customer Profile Update');
        DB::commit();

        return [true, '', 'Updated Customer Profile'];
    }

}
