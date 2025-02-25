<?php

namespace App\Repository\Customer\Api\Businesslogic\Support;

use App\Models\Admin\Settings\Termsandsupport\Support;
use App\Repository\Customer\Api\Interfacelayer\Support\ICustomerSupportApiRepository;

class CustomerSupportApiRepository implements ICustomerSupportApiRepository
{

    public function customertermsandcondition()
    {
        return [true,
            ['termsandcondition' => Support::where('panel', 'CUSTOMER')->where('type', 1)->select('description')->first()],
            'Customer Terms & Condition'];
    }

    public function customerfaq()
    {
        return [true,
            ['customerfaq' => Support::where('panel', 'CUSTOMER')->where('type', 2)->select('description')->first()],
            'Customer FAQ'];
    }

    public function customercontactus()
    {
        return [true,
            ['customercontactus' => Support::where('panel', 'CUSTOMER')->where('type', 3)->select('description')->first()],
            'Customer Contact Us'];
    }

}
