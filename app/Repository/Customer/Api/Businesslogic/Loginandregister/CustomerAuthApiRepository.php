<?php

namespace App\Repository\Customer\Api\Businesslogic\Loginandregister;

use App\Events\Auth\LoginotpEvent;
use App\Models\Admin\Settings\Otp\Otphistory;
use App\Models\Customer\Auth\Customer;
use App\Models\Miscellaneous\Helper;
use App\Repository\Customer\Api\Interfacelayer\Loginandregister\ICustomerAuthApiRepository;
use Auth;
use Carbon\Carbon;
use Config;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Tzsk\Otp\Facades\Otp;

class CustomerAuthApiRepository implements ICustomerAuthApiRepository
{

    public function customerphonelogin($loginsessionid)
    {

        $user = Customer::where('phone', request('phone'))->first();

        if ($user) {
            if ($user->is_accountactive) {
                $otp = Otp::digits(Config::get('archive.customerotp.digits'))
                    ->expiry(Config::get('archive.customerotp.expiry'))
                    ->generate($loginsessionid);
                Log::info("SessionID " . $loginsessionid . " Existing customer Api login otp = " . $otp);
                $user->last_loginsessionid = $loginsessionid;
                $user->otp = $otp;
                $user->save();
                Otphistory::create(['panel' => 'CUSTOMER', 'details' => 'CUSTOMER OTP', 'phone' => request('phone'), 'otp' => $otp]);
                event(new LoginOtpEvent('Existing Customer OTP Api', request('phone'), $otp));
                DB::commit();

                return [true, [
                    'loginsessionid' => $loginsessionid,
                    'usertype' => $user->usertype,
                    'phone' => request('phone')],
                    ($user->usertype == 1) ? 'New User' : 'Existing User'];

            } else {
                DB::rollback();
                return [false, 'Your Account is Disabled, Kindly Conduct ' . env('APP_NAME') . ' Support'];
            }
        } else {
            $otp = Otp::digits(Config::get('archive.customerotp.digits'))
                ->expiry(Config::get('archive.customerotp.expiry'))
                ->generate($loginsessionid);

            Log::info("loginsessionid " . $loginsessionid . " New customer Api login otp = " . $otp . " Phone Number " . request('phone'));
            Otphistory::create(['panel' => 'CUSTOMER', 'details' => 'NEW CUSTOMER OTP', 'phone' => request('phone'), 'otp' => $otp]);
            event(new LoginotpEvent('New Customer OTP Api', request('phone'), $otp));
            DB::commit();

            return [true,
                ['loginsessionid' => $loginsessionid,
                    'usertype' => 1, // New User
                    'phone' => request('phone')],
                'New User.'];
        }
    }

    public function customerresendotp()
    {
        $user = Customer::where('phone', request('phone'))->first();

        if ($user) {
            if ($user->is_accountactive) {
                $otp = Otp::digits(Config::get('archive.customerotp.digits'))
                    ->expiry(Config::get('archive.customerotp.expiry'))
                    ->generate(request('loginsessionid'));
                Log::info("loginsessionid " . request('loginsessionid') . " Resend Existing customer Api login otp = " . $otp);
                $user->otp = $otp;
                $user->save();
                Otphistory::create(['panel' => 'CUSTOMER', 'details' => 'CUSTOMER RESEND OTP', 'phone' => request('phone'), 'otp' => $otp]);
                event(new LoginOtpEvent('Resend Existing Customer OTP Api', request('phone'), $otp));
                DB::commit();

                return [true, [
                    'loginsessionid' => request('loginsessionid'),
                    'usertype' => $user->usertype,
                    'phone' => request('phone'),
                ],
                    'Resend Otp Done successfully For Existing User.'];

            } else {
                DB::rollback();
                return [false, 'Your Account is Disabled, Kindly Conduct ' . env('APP_NAME') . ' Support'];
            }
        } else {
            $otp = Otp::digits(Config::get('archive.customerotp.digits'))
                ->expiry(Config::get('archive.customerotp.expiry'))
                ->generate(request('loginsessionid'));

            Log::info("loginsessionid " . request('loginsessionid') . " Resend New Customer Api login otp = " . $otp . " Phone Number " . request('phone'));
            Otphistory::create(['panel' => 'CUSTOMER', 'details' => 'NEW CUSTOMER RESEND OTP', 'phone' => request('phone'), 'otp' => $otp]);
            event(new LoginOtpEvent('Resend New Customer OTP Api', request('phone'), $otp));
            DB::commit();

            return [true, [
                'loginsessionid' => request('loginsessionid'),
                'usertype' => 1, // New User
                'phone' => request('phone'),
            ], 'Resend Otp Done successfully For New User.'];

        }
    }

    public function customerotplogin()
    {
        $user = Customer::where('phone', request('phone'))->first();

        if ($user) {
            if ($user->otp != request('otp')) {
                DB::rollback();
                return [false, 'InCorrect OTP'];
            }
            Auth::guard('customer')->login($user, true);
            $user->otp = null;
            $user->save();

            $tokenResult = $user->createToken('appToken', ['customer']);
            $token = $tokenResult->token;
            if (request()->remember_me) {
                $token->expires_at = Carbon::now()->addYear(2);
            }
            $token->save();

            $data['token'] = $tokenResult->accessToken;
            $data['token_type'] = 'Bearer';
            $data['expires_at'] = Carbon::parse($tokenResult->token->expires_at)->toDateTimeString(); // default one year
            $data['usertype'] = $user->usertype; // Existing User
            $data['name'] = $user->name ? $user->name : '';
            $data['phone'] = $user->phone ? $user->phone : '';
            $data['email'] = $user->email ? $user->email : '';
            $data['uuid'] = $user->uuid;

            Helper::trackmessage($user, $user, 'customer_api_customerotplogin', substr($data['token'], -33), 'API', 'Customer Login');
            Helper::deviceInfo($user, substr($data['token'], -33), 'API');

            DB::commit();
            return [true, $data, 'Logged In successfully.'];

        } else {

            $userval['name'] = '';
            $userval['phone'] = request('phone');
            $userval['phone_verified_at'] = Carbon::now();
            $userval['password'] = rand(10000000, 99999999);
            $user = Customer::create($userval);

            Auth::guard('customer')->login($user, true);

            $tokenResult = $user->createToken('appToken', ['customer']);
            $token = $tokenResult->token;
            if (request()->remember_me) {
                $token->expires_at = Carbon::now()->addYear();
            }
            $token->save();

            $data['token'] = $tokenResult->accessToken;
            $data['token_type'] = 'Bearer';
            $data['expires_at'] = Carbon::parse($tokenResult->token->expires_at)->toDateTimeString();
            $data['usertype'] = 1; // New User

            Helper::trackmessage($user, $user, 'customer_api_customerotplogin', substr($data['token'], -33), 'API', 'New Customer Login');
            Helper::deviceInfo($user, substr($data['token'], -33), 'API');

            DB::commit();
            return [true, $data, 'Register Successfully.'];
        }
    }

    public function signupform()
    {
        $customer = Customer::find(Auth::user()->id);
        $customer->update([
            'name' => request('name'),
            'email' => request('email'),
            'dob' => request('dob'),
            'signupform_status' => 2, // signupform completed status
            'usertype' => 2,
        ]);
        Helper::trackmessage($customer, $customer, 'customer_api_signupform', substr(request()->header('authorization'), -33), 'API', 'Customer Sign Up Update');

        DB::commit();
        return [true, '', 'Signed Up Form Updated Successfully.'];
    }

    public function latandlngupdate()
    {
        $customer = Customer::find(Auth::user()->id);
        $customer->update([
            'latitude' => request('latitude'),
            'longitude' => request('longitude'),
            'addresstype' => request('addresstype'),
            'doornumber' => request('doornumber'),
            'landmark' => request('landmark'),
            'address_lineone' => request('address_lineone'),
            'signupform_status' => 3, // lat lng completed status
        ]);
        Helper::trackmessage($customer, $customer, 'customer_api_latandlngupdate', substr(request()->header('authorization'), -33), 'API', 'Customer Lat Lang Update');

        DB::commit();
        return [true, '', 'Address Updated Successfully.'];
    }

    public function customerlogout()
    {
        $customer = Auth::user();
        if ($customer) {
            Helper::trackmessage($customer, $customer, 'customer_api_customerlogout', substr(request()->header('authorization'), -33), 'API', 'Customer Logout');
            $customer = $customer->token();
            $customer->revoke();
            DB::commit();
            return [true, '', 'Logout successfully'];
        } else {
            DB::rollback();
            return [false, 'Unable to Logout'];
        }
    }

}
