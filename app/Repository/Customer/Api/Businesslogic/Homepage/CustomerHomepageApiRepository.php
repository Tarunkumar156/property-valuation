<?php

namespace App\Repository\Customer\Api\Businesslogic\Homepage;

use App\Repository\Customer\Api\Interfacelayer\Homepage\ICustomerHomepageApiRepository;
use Auth;

class CustomerHomepageApiRepository implements ICustomerHomepageApiRepository
{

    public function customerhomepage()
    {
        $user = Auth::user();
        return [true, $user->name, 'Home Page'];
    }

}
