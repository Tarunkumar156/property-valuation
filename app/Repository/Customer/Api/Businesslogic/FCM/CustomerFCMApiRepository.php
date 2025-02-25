<?php

namespace App\Repository\Customer\Api\Businesslogic\FCM;

use App\Models\Miscellaneous\Helper;
use App\Repository\Customer\Api\Interfacelayer\FCM\ICustomerFCMApiRepository;
use DB;
use Illuminate\Support\Facades\Auth;

class CustomerFCMApiRepository implements ICustomerFCMApiRepository
{
    public function customersavedeviceinfo()
    {
        $customer = auth()->user();
        $customer->update([
            'device_token' => request('device_token'),
            'device_model' => request('device_model'),
            'device_brand' => request('device_brand'),
            'device_manufacturer' => request('device_manufacturer'),
        ]);

        Helper::trackmessage($customer, $customer, 'customer_api_customersavedeviceinfo', substr(request()->header('authorization'), -33), 'API', 'Customer Device Info');
        DB::commit();

        return [true, [], 'Customer Token Updted Successfully'];
    }

}
