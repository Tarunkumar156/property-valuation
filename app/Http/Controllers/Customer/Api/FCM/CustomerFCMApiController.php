<?php

namespace App\Http\Controllers\Customer\Api\FCM;

use App\Http\Controllers\Helper\BaseController as BaseController;
use App\Repository\Customer\Api\Interfacelayer\FCM\ICustomerFCMApiRepository;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Validator;

class CustomerFCMApiController extends BaseController
{

    public $customerFCMrepo;

    public function __construct(ICustomerFCMApiRepository $customerFCMrepo)
    {
        $this->customerFCMrepo = $customerFCMrepo;
    }

    public function customersavedeviceinfo(Request $request)
    {
        try {
            DB::beginTransaction();
            Log::info("SessionID " . substr(request()->header('authorization'), -33) . ' Function : customersavedeviceinfo');

            $validator = Validator::make($request->all(), [
                'device_token' => 'required|string',
                'device_model' => 'nullable|string',
                'device_brand' => 'nullable|string',
                'device_manufacturer' => 'nullable|string',
            ]);

            if ($validator->fails()) {
                DB::rollback();
                return $this->sendError($validator->errors()->first());
            }

            $data = $this->customerFCMrepo->customersavedeviceinfo();
            return ($data[0]) ? $this->sendResponse($data[1], $data[2]) : $this->sendError($data[1]);

        } catch (Exception $e) {
            DB::rollback();
            Log::error('Exception one: customersavedeviceinfo - SessionID ' . substr(request()->header('authorization'), -33) . ' Error: ' . $e->getMessage());
            return $this->sendError('Exception one : ', $e->getMessage());
        } catch (\Illuminate\Database\QueryException$e) {
            DB::rollback();
            Log::error('Exception two: customersavedeviceinfo - SessionID ' . substr(request()->header('authorization'), -33) . ' Error: ' . $e->getMessage());
            return $this->sendError('Exception two : ', $e->getMessage());
        } catch (PDOException $e) {
            DB::rollback();
            Log::error('Exception three: customersavedeviceinfo - SessionID ' . substr(request()->header('authorization'), -33) . ' Error: ' . $e->getMessage());
            return $this->sendError('Exception three : ', $e->getMessage());
        }
    }

}
