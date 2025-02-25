<?php

use App\Http\Controllers\Customer\Api\FCM\CustomerFCMApiController;
use App\Http\Controllers\Customer\Api\Homepage\CustomerHomepageApiController;
use App\Http\Controllers\Customer\Api\Loginandregister\CustomerAuthApiController;
use App\Http\Controllers\Customer\Api\Profile\CustomerProfileApiController;
use App\Http\Controllers\Customer\Api\Support\CustomerSupportApiController;
use Illuminate\Support\Facades\Route;

// Customer Login Api
Route::group(['prefix' => 'v1/customer'], function () {

    // Customer Login
    Route::post('customerphonelogin', [CustomerAuthApiController::class, 'customerphonelogin']);
    Route::post('customerotplogin', [CustomerAuthApiController::class, 'customerotplogin']);
    Route::post('customerresendotp', [CustomerAuthApiController::class, 'customerresendotp']);
    Route::post('signupform', [CustomerAuthApiController::class, 'signupform'])->middleware(['auth:api-customers', 'scopes:customer']);
    Route::post('latandlngupdate', [CustomerAuthApiController::class, 'latandlngupdate'])->middleware(['auth:api-customers', 'scopes:customer']);
    Route::get('logout', [CustomerAuthApiController::class, 'customerlogout'])->middleware(['auth:api-customers', 'scopes:customer']);

    // Deviceinfo
    Route::post('/customersavedeviceinfo', [CustomerFCMApiController::class, 'customersavedeviceinfo'])->middleware(['auth:api-customers', 'scopes:customer']);

    // Profile
    Route::get('getcustomerprofile', [CustomerProfileApiController::class, 'getcustomerprofile'])->middleware(['auth:api-customers', 'scopes:customer']);
    Route::post('updatecustomerprofile', [CustomerProfileApiController::class, 'updatecustomerprofile'])->middleware(['auth:api-customers', 'scopes:customer']);

    // Support
    Route::get('customertermsandcondition', [CustomerSupportApiController::class, 'customertermsandcondition'])->middleware(['auth:api-customers', 'scopes:customer']);
    Route::get('customerfaq', [CustomerSupportApiController::class, 'customerfaq'])->middleware(['auth:api-customers', 'scopes:customer']);
    Route::get('customercontactus', [CustomerSupportApiController::class, 'customercontactus'])->middleware(['auth:api-customers', 'scopes:customer']);

    // HomePage
    Route::get('customerhomepage', [CustomerHomepageApiController::class, 'customerhomepage'])->middleware(['auth:api-customers', 'scopes:customer']);

});
