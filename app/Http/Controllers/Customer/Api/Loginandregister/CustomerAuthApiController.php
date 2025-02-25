<?php

namespace App\Http\Controllers\Customer\Api\Loginandregister;

use App\Http\Controllers\Helper\BaseController as BaseController;
use App\Repository\Customer\Api\Interfacelayer\Loginandregister\ICustomerAuthApiRepository;
use Config;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;
use Tzsk\Otp\Facades\Otp;
use Validator;

class CustomerAuthApiController extends BaseController
{

    public $customerauth;

    public function __construct(ICustomerAuthApiRepository $customerauth)
    {
        $this->customerauth = $customerauth;
    }

    public function customerphonelogin(Request $request)
    {
        try {
            DB::beginTransaction();

            $loginsessionid = (string) Str::uuid();
            Log::info("loginsessionID " . $loginsessionid . ' Function : customerphonelogin');

            $validator = Validator::make($request->all(), [
                'phone' => 'required|numeric|digits:10',
            ]);

            if ($validator->fails()) {
                DB::rollback();
                return $this->sendError($validator->errors()->first());
            }

            $data = $this->customerauth->customerphonelogin($loginsessionid);

            return ($data[0]) ? $this->sendResponse($data[1], $data[2]) : $this->sendError($data[1]);

        } catch (Exception $e) {
            DB::rollback();
            Log::error('Exception one: customerphonelogin - loginsessionid ' . $loginsessionid . ' Error: ' . $e->getMessage());
            return $this->sendError('Exception one : ', $e->getMessage());
        } catch (\Illuminate\Database\QueryException$e) {
            DB::rollback();
            Log::error('Exception two: customerphonelogin - loginsessionid ' . $loginsessionid . ' Error: ' . $e->getMessage());
            return $this->sendError('Exception two : ', $e->getMessage());
        } catch (PDOException $e) {
            DB::rollback();
            Log::error('Exception three: customerphonelogin - loginsessionid ' . $loginsessionid . ' Error: ' . $e->getMessage());
            return $this->sendError('Exception three : ', $e->getMessage());
        }
    }

    public function customerresendotp(Request $request)
    {
        try {
            DB::beginTransaction();

            Log::info("loginsessionid " . request('loginsessionid') . ' Function : customerresendotp');

            $validator = Validator::make($request->all(), [
                'phone' => 'required|numeric|digits:10',
                'loginsessionid' => 'required|string|max:50',
            ]);

            if ($validator->fails()) {
                DB::rollback();
                return $this->sendError($validator->errors()->first());
            }

            $data = $this->customerauth->customerresendotp();

            return ($data[0]) ? $this->sendResponse($data[1], $data[2]) : $this->sendError($data[1]);

        } catch (Exception $e) {
            DB::rollback();
            Log::error('Exception one: customerresendotp - loginsessionid ' . request('loginsessionid') . ' Error: ' . $e->getMessage());
            return $this->sendError('Exception one : ', $e->getMessage());
        } catch (\Illuminate\Database\QueryException$e) {
            DB::rollback();
            Log::error('Exception two: customerresendotp - loginsessionid ' . request('loginsessionid') . ' Error: ' . $e->getMessage());
            return $this->sendError('Exception two : ', $e->getMessage());
        } catch (PDOException $e) {
            DB::rollback();
            Log::error('Exception three: customerresendotp - loginsessionid ' . request('loginsessionid') . ' Error: ' . $e->getMessage());
            return $this->sendError('Exception three : ', $e->getMessage());
        }
    }

    public function customerotplogin(Request $request)
    {
        try {
            DB::beginTransaction();

            Log::info("SessionID " . request('loginsessionid') . ' Function : customerotplogin');

            $validator = Validator::make($request->all(), [
                'phone' => 'required|numeric|digits:10',
                'otp' => 'required|numeric|digits:6',
                'remember_me' => 'nullable|boolean',
                'loginsessionid' => 'required|string|max:50',
            ]);

            if ($validator->fails()) {
                DB::rollback();
                return $this->sendError($validator->errors()->first());
            }

            if (!Otp::digits(Config::get('archive.customerotp.digits'))
                ->expiry(Config::get('archive.customerotp.expiry'))
                ->check(request('otp'), request('loginsessionid'))) {
                DB::rollback();
                return $this->sendError('The OTP code has expired. Please re-send the verification code to try again.');
            }

            $data = $this->customerauth->customerotplogin();

            return ($data[0]) ? $this->sendResponse($data[1], $data[2]) : $this->sendError($data[1]);

        } catch (Exception $e) {
            DB::rollback();
            Log::error('Exception one: customerotplogin - loginsessionid ' . request('loginsessionid') . ' Error: ' . $e->getMessage());
            return $this->sendError('Exception one : ', $e->getMessage());
        } catch (\Illuminate\Database\QueryException$e) {
            DB::rollback();
            Log::error('Exception two: customerotplogin - loginsessionid ' . request('loginsessionid') . ' Error: ' . $e->getMessage());
            return $this->sendError('Exception two : ', $e->getMessage());
        } catch (PDOException $e) {
            DB::rollback();
            Log::error('Exception three: customerotplogin - loginsessionid ' . request('loginsessionid') . ' Error: ' . $e->getMessage());
            return $this->sendError('Exception three : ', $e->getMessage());
        }
    }

    public function signupform(Request $request)
    {
        try {
            DB::beginTransaction();

            Log::info("SessionID " . substr(request()->header('authorization'), -33) . ' Function : signupform');

            $validator = Validator::make($request->all(), [
                'name' => 'required|string|max:30',
                'email' => 'required|string|email|max:30|unique:customers',
                'dob' => 'nullable|date',
                'refcode' => 'nullable|numeric|digits:8',
            ]);

            if ($validator->fails()) {
                DB::rollback();
                return $this->sendError($validator->errors()->first());
            }

            $data = $this->customerauth->signupform();
            return ($data[0]) ? $this->sendResponse($data[1], $data[2]) : $this->sendError($data[1]);

        } catch (Exception $e) {
            DB::rollback();
            Log::error('Exception one: signupform - SessionID ' . substr(request()->header('authorization'), -33) . ' Error: ' . $e->getMessage());
            return $this->sendError('Exception one : ', $e->getMessage());
        } catch (\Illuminate\Database\QueryException$e) {
            DB::rollback();
            Log::error('Exception two: signupform - SessionID ' . substr(request()->header('authorization'), -33) . ' Error: ' . $e->getMessage());
            return $this->sendError('Exception two : ', $e->getMessage());
        } catch (PDOException $e) {
            DB::rollback();
            Log::error('Exception three: signupform - SessionID ' . substr(request()->header('authorization'), -33) . ' Error: ' . $e->getMessage());
            return $this->sendError('Exception three : ', $e->getMessage());
        }
    }

    public function latandlngupdate(Request $request)
    {
        try {
            DB::beginTransaction();

            Log::info("SessionID " . substr(request()->header('authorization'), -33) . ' Function : latandlngupdate');

            $validator = Validator::make($request->all(), [
                'latitude' => 'required|numeric',
                'longitude' => 'required|numeric',
                'addresstype' => 'required',
                'doornumber' => 'required|max:20',
                'landmark' => 'required|max:50',
                'address_lineone' => 'required|max:200',
            ]);

            if ($validator->fails()) {
                DB::rollback();
                return $this->sendError($validator->errors()->first());
            }

            $data = $this->customerauth->latandlngupdate();
            return ($data[0]) ? $this->sendResponse($data[1], $data[2]) : $this->sendError($data[1]);

        } catch (Exception $e) {
            DB::rollback();
            Log::error('Exception one: latandlngupdate - SessionID ' . substr(request()->header('authorization'), -33) . ' Error: ' . $e->getMessage());
            return $this->sendError('Exception one : ', $e->getMessage());
        } catch (\Illuminate\Database\QueryException$e) {
            DB::rollback();
            Log::error('Exception two: latandlngupdate - SessionID ' . substr(request()->header('authorization'), -33) . ' Error: ' . $e->getMessage());
            return $this->sendError('Exception two : ', $e->getMessage());
        } catch (PDOException $e) {
            DB::rollback();
            Log::error('Exception three: latandlngupdate - SessionID ' . substr(request()->header('authorization'), -33) . ' Error: ' . $e->getMessage());
            return $this->sendError('Exception three : ', $e->getMessage());
        }
    }

    public function customerlogout()
    {
        try {
            DB::beginTransaction();
            Log::info("SessionID " . substr(request()->header('authorization'), -33) . ' Function : customerlogout');
            $data = $this->customerauth->customerlogout();
            return ($data[0]) ? $this->sendResponse($data[1], $data[2]) : $this->sendError($data[1]);

        } catch (Exception $e) {
            DB::rollback();
            Log::error('Exception one: customerlogout - SessionID ' . substr(request()->header('authorization'), -33) . ' Error: ' . $e->getMessage());
            return $this->sendError('Exception one : ', $e->getMessage());
        } catch (\Illuminate\Database\QueryException$e) {
            DB::rollback();
            Log::error('Exception two: customerlogout - SessionID ' . substr(request()->header('authorization'), -33) . ' Error: ' . $e->getMessage());
            return $this->sendError('Exception two : ', $e->getMessage());
        } catch (PDOException $e) {
            DB::rollback();
            Log::error('Exception three: customerlogout - SessionID ' . substr(request()->header('authorization'), -33) . ' Error: ' . $e->getMessage());
            return $this->sendError('Exception three : ', $e->getMessage());
        }
    }

}
