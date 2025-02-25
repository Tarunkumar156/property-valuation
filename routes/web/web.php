<?php

use App\Http\Controllers\Website\SupportwebController;
use Illuminate\Support\Facades\Route;

Route::get('customertermsandcondition', [SupportwebController::class, 'customertermsandcondition']);
Route::get('customerfaq', [SupportwebController::class, 'customerfaq']);
Route::get('customercontactus', [SupportwebController::class, 'customercontactus']);
