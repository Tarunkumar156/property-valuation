<?php

namespace App\Http\Controllers\Customer\Api\Support;

use App\Http\Controllers\Helper\BaseController as BaseController;
use App\Repository\Customer\Api\Interfacelayer\Support\ICustomerSupportApiRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class CustomerSupportApiController extends BaseController
{

    public $customersupport;

    public function __construct(ICustomerSupportApiRepository $customersupport)
    {
        $this->customersupport = $customersupport;
    }

    public function customertermsandcondition(Request $request)
    {

        try {
            Log::info("SessionID " . substr(request()->header('authorization'), -33) . ' Function : customertermsandcondition');

            $data = $this->customersupport->customertermsandcondition();
            return ($data[0]) ? $this->sendResponse($data[1], $data[2]) : $this->sendError($data[1]);

        } catch (Exception $e) {
            Log::error('Exception one: customertermsandcondition - SessionID ' . substr(request()->header('authorization'), -33) . ' Error: ' . $e->getMessage());
            return $this->sendError('Exception one : ', $e->getMessage());
        } catch (\Illuminate\Database\QueryException$e) {
            Log::error('Exception two: customertermsandcondition - SessionID ' . substr(request()->header('authorization'), -33) . ' Error: ' . $e->getMessage());
            return $this->sendError('Exception two : ', $e->getMessage());
        } catch (PDOException $e) {
            Log::error('Exception three: customertermsandcondition - SessionID ' . substr(request()->header('authorization'), -33) . ' Error: ' . $e->getMessage());
            return $this->sendError('Exception three : ', $e->getMessage());
        }
    }

    public function customerfaq(Request $request)
    {
        try {

            Log::info("SessionID " . substr(request()->header('authorization'), -33) . ' Function : customerfaq');

            $data = $this->customersupport->customerfaq();
            return ($data[0]) ? $this->sendResponse($data[1], $data[2]) : $this->sendError($data[1]);

        } catch (Exception $e) {
            Log::error('Exception one: customerfaq - SessionID ' . substr(request()->header('authorization'), -33) . ' Error: ' . $e->getMessage());
            return $this->sendError('Exception one : ', $e->getMessage());
        } catch (\Illuminate\Database\QueryException$e) {
            Log::error('Exception two: customerfaq - SessionID ' . substr(request()->header('authorization'), -33) . ' Error: ' . $e->getMessage());
            return $this->sendError('Exception two : ', $e->getMessage());
        } catch (PDOException $e) {
            Log::error('Exception three: customerfaq - SessionID ' . substr(request()->header('authorization'), -33) . ' Error: ' . $e->getMessage());
            return $this->sendError('Exception three : ', $e->getMessage());
        }
    }

    public function customercontactus(Request $request)
    {
        try {

            Log::info("SessionID " . substr(request()->header('authorization'), -33) . ' Function : customercontactus');

            $data = $this->customersupport->customercontactus();
            return ($data[0]) ? $this->sendResponse($data[1], $data[2]) : $this->sendError($data[1]);

        } catch (Exception $e) {
            Log::error('Exception one: customercontactus - SessionID ' . substr(request()->header('authorization'), -33) . ' Error: ' . $e->getMessage());
            return $this->sendError('Exception one : ', $e->getMessage());
        } catch (\Illuminate\Database\QueryException$e) {
            Log::error('Exception two: customercontactus - SessionID ' . substr(request()->header('authorization'), -33) . ' Error: ' . $e->getMessage());
            return $this->sendError('Exception two : ', $e->getMessage());
        } catch (PDOException $e) {
            Log::error('Exception three: customercontactus - SessionID ' . substr(request()->header('authorization'), -33) . ' Error: ' . $e->getMessage());
            return $this->sendError('Exception three : ', $e->getMessage());
        }
    }
}
