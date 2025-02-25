<?php

namespace App\Repository\Customer\Api\Interfacelayer\Loginandregister;

interface ICustomerAuthApiRepository
{
    public function customerphonelogin($loginsessionid);

    public function customerotplogin();

    public function customerresendotp();

    public function signupform();

    public function latandlngupdate();

    public function customerlogout();
}
