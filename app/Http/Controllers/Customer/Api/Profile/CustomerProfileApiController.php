<?php

namespace App\Http\Controllers\Customer\Api\Profile;

use App\Http\Controllers\Helper\BaseController as BaseController;
use App\Repository\Customer\Api\Interfacelayer\Profile\ICustomerProfileApiRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Validator;

class CustomerProfileApiController extends BaseController
{

    public $customerprofile;

    public function __construct(ICustomerProfileApiRepository $customerprofile)
    {
        $this->customerprofile = $customerprofile;
    }

    public function getcustomerprofile(Request $request)
    {
        try {

            Log::info("SessionID " . substr(request()->header('authorization'), -33) . ' Function : getcustomerprofile');

            $data = $this->customerprofile->getcustomerprofile();
            return ($data[0]) ? $this->sendResponse($data[1], $data[2]) : $this->sendError($data[1]);

        } catch (Exception $e) {
            Log::error('Exception one: getcustomerprofile - SessionID ' . substr(request()->header('authorization'), -33) . ' Error: ' . $e->getMessage());
            return $this->sendError('Exception one : ', $e->getMessage());
        } catch (\Illuminate\Database\QueryException$e) {
            Log::error('Exception two: getcustomerprofile - SessionID ' . substr(request()->header('authorization'), -33) . ' Error: ' . $e->getMessage());
            return $this->sendError('Exception two : ', $e->getMessage());
        } catch (PDOException $e) {
            Log::error('Exception three: getcustomerprofile - SessionID ' . substr(request()->header('authorization'), -33) . ' Error: ' . $e->getMessage());
            return $this->sendError('Exception three : ', $e->getMessage());
        }
    }

    public function updatecustomerprofile(Request $request)
    {
        try {
            DB::beginTransaction();

            $validator = Validator::make($request->all(), [
                'name' => 'required|string|max:30',
                'email' => 'required|string|email|max:30|unique:customers,email,' . Auth::user()->id,
                'dob' => 'nullable|date',
            ]);

            if ($validator->fails()) {
                DB::rollback();
                return $this->sendError($validator->errors()->first());
            }

            Log::info("SessionID " . substr(request()->header('authorization'), -33) . ' Function : updatecustomerprofile');

            $data = $this->customerprofile->updatecustomerprofile();
            return ($data[0]) ? $this->sendResponse($data[1], $data[2]) : $this->sendError($data[1]);

        } catch (Exception $e) {
            DB::rollback();
            Log::error('Exception one: updatecustomerprofile - SessionID ' . substr(request()->header('authorization'), -33) . ' Error: ' . $e->getMessage());
            return $this->sendError('Exception one : ', $e->getMessage());
        } catch (\Illuminate\Database\QueryException$e) {
            DB::rollback();
            Log::error('Exception two: updatecustomerprofile - SessionID ' . substr(request()->header('authorization'), -33) . ' Error: ' . $e->getMessage());
            return $this->sendError('Exception two : ', $e->getMessage());
        } catch (PDOException $e) {
            DB::rollback();
            Log::error('Exception three: updatecustomerprofile - SessionID ' . substr(request()->header('authorization'), -33) . ' Error: ' . $e->getMessage());
            return $this->sendError('Exception three : ', $e->getMessage());
        }
    }

}
