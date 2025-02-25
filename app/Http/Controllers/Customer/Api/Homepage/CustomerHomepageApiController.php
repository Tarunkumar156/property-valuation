<?php

namespace App\Http\Controllers\Customer\Api\Homepage;

use App\Http\Controllers\Helper\BaseController as BaseController;
use App\Repository\Customer\Api\Interfacelayer\Homepage\ICustomerHomepageApiRepository;
use Illuminate\Support\Facades\Log;

class CustomerHomepageApiController extends BaseController
{

    public $customerhomepage;

    public function __construct(ICustomerHomepageApiRepository $customerhomepage)
    {
        $this->customerhomepage = $customerhomepage;
    }

    public function customerhomepage()
    {
        try {

            Log::info("SessionID " . substr(request()->header('authorization'), -33) . ' Function : customerhomepage');

            $data = $this->customerhomepage->customerhomepage();
            return ($data[0]) ? $this->sendResponse($data[1], $data[2]) : $this->sendError($data[1]);

        } catch (Exception $e) {
            Log::error('Exception one: customerhomepage - SessionID ' . substr(request()->header('authorization'), -33) . ' Error: ' . $e->getMessage());
            return $this->sendError('Exception one : ', $e->getMessage());
        } catch (\Illuminate\Database\QueryException$e) {
            Log::error('Exception two: customerhomepage - SessionID ' . substr(request()->header('authorization'), -33) . ' Error: ' . $e->getMessage());
            return $this->sendError('Exception two : ', $e->getMessage());
        } catch (PDOException $e) {
            Log::error('Exception three: customerhomepage - SessionID ' . substr(request()->header('authorization'), -33) . ' Error: ' . $e->getMessage());
            return $this->sendError('Exception three : ', $e->getMessage());
        }
    }

}
