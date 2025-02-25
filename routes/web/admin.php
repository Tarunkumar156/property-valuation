<?php

use App\Http\Controllers\Admin\Configuration\Google2fa\PasswordSecurityController;
use App\Http\Controllers\Admin\Web\Customer\CustomerController;
use App\Http\Controllers\Admin\Web\Dashboard\AdmindashboardController;
use App\Http\Controllers\Admin\Web\Report\ReportController;
use App\Http\Controllers\Admin\Web\Settings\Configuration\AdminconfigurationkeyController;
use App\Http\Controllers\Admin\Web\Settings\Configuration\AdminconfigurationwebController;
use App\Http\Controllers\Admin\Web\Settings\Configuration\ColorController;
use App\Http\Controllers\Admin\Web\Settings\Employee\AddemployeeController;
use App\Http\Controllers\Admin\Web\Settings\Generalsetting\EmailsettingController;
use App\Http\Controllers\Admin\Web\Settings\Generalsetting\FcmsettingController;
use App\Http\Controllers\Admin\Web\Settings\Generalsetting\GatewaysettingController;
use App\Http\Controllers\Admin\Web\Settings\Generalsetting\GeneralsettingController;
use App\Http\Controllers\Admin\Web\Settings\Generalsetting\SmssettingController;
use App\Http\Controllers\Admin\Web\Settings\Generalsetting\ThemesettingController;
use App\Http\Controllers\Admin\Web\Settings\Mastersetting\CategoryController;
use App\Http\Controllers\Admin\Web\Settings\Mastersetting\DeliverytimeController;
use App\Http\Controllers\Admin\Web\Settings\Mastersetting\EngineerController;
use App\Http\Controllers\Admin\Web\Settings\Mastersetting\ExperienceController;
use App\Http\Controllers\Admin\Web\Settings\Mastersetting\LocationController;
use App\Http\Controllers\Admin\Web\Settings\Mastersetting\RatingController;
use App\Http\Controllers\Admin\Web\Settings\Otp\OtphistoryController;
use App\Http\Controllers\Admin\Web\Settings\Role\RoleController;
use App\Http\Controllers\Admin\Web\Settings\Settings\AdminsettingsController;
use App\Http\Controllers\Admin\Web\Settings\Termsandsupport\SupportController;
use App\Http\Controllers\Admin\Web\Settings\Tracking\LogininfoController;
use App\Http\Controllers\Admin\Web\Settings\Tracking\TrackingController;
use App\Http\Controllers\Admin\Web\Settings\User\UserController;
use App\Http\Controllers\Admin\Web\Valuation\ValuationController;
use App\Http\Controllers\Auth\LoginController;
use Illuminate\Support\Facades\Route;

Route::get('admin/session', fn() =>
    ((session('sessiontoggled') == 'toggled') ? session()->forget('sessiontoggled') : session(['sessiontoggled' => 'toggled']))
)->middleware('auth', 'preventbackbutton');

Route::get('logs', '\Rap2hpoutre\LaravelLogViewer\LogViewerController@index');

Route::controller(LoginController::class)
    ->group(function () {
        Route::get('/', 'showadminloginform');
        Route::get('admin/login', 'showadminloginform')->name('adminlogin');
        Route::post('admin/login', 'adminlogin')->name('adminloginpost');
        Route::get('logout', 'logout')->name('adminlogout');
        Route::post('logout', 'logout')->name('adminlogout');
    });

Route::group(['middleware' => ['auth', 'preventbackbutton'], 'prefix' => 'admin'], function () {
    // Dashboard
    Route::get('/admindashboard', [AdmindashboardController::class, 'dashboard'])->name('admindashboard');

    // Customer
    Route::get('/customer', [CustomerController::class, 'customer'])->name('customer');
    // Valuation
    Route::get('/valuation', [ValuationController::class, 'valuation'])->name('valuation');
    Route::get('/valuationprocess/{id}', [ValuationController::class, 'valuationprocess'])->name('valuationprocess');

    Route::get('/customerreport', [ReportController::class, 'customerreport'])->name('customerreport');
    Route::get('/valuationreport', [ReportController::class, 'valuationreport'])->name('valuationreport');
    Route::get('/valuationreportpdfstream/{valuation}/{show}', [ReportController::class, 'valuationreportpdfstream'])->name('valuationreportpdfstream');

    // Settings
    Route::get('/settings', [AdminsettingsController::class, 'index'])->name('settings');

    // Master Settings
    Route::get('category', [CategoryController::class, 'category'])->name('category');
    Route::get('deliverytime', [DeliverytimeController::class, 'deliverytime'])->name('deliverytime');
    Route::get('experience', [ExperienceController::class, 'experience'])->name('experience');
    Route::get('location', [LocationController::class, 'location'])->name('location');
    Route::get('rating', [RatingController::class, 'rating'])->name('rating');
    Route::get('engineer', [EngineerController::class, 'engineer'])->name('engineer');

    // General Settings
    Route::get('/generalsetting', [GeneralsettingController::class, 'generalsetting'])->name('generalsetting');
    Route::get('/emailsetting', [EmailsettingController::class, 'emailsetting'])->name('emailsetting');
    Route::get('/fcmsetting', [FcmsettingController::class, 'fcmsetting'])->name('fcmsetting');
    Route::get('/gatewaysetting', [GatewaysettingController::class, 'gatewaysetting'])->name('gatewaysetting');
    Route::get('/smssetting', [SmssettingController::class, 'smssetting'])->name('smssetting');
    Route::get('/themesetting', [ThemesettingController::class, 'themesetting'])->name('themesetting');

    // Terms & Support
    Route::get('/support', [SupportController::class, 'support'])->name('support');

    // OTP History
    Route::get('/otphistory', [OtphistoryController::class, 'otphistory'])->name('otphistory');

    Route::controller(UserController::class)
        ->group(function () {
            Route::get('usercreateoredit', 'usercreateoredit')->name('usercreateoredit');
            Route::get('userchangepassword', 'userchangepassword')->name('userchangepassword');
            Route::get('userrole', 'userrole')->name('userrole');
        });

    Route::get('logininfo', [LogininfoController::class, 'logininfo'])->name('logininfo');
    Route::get('tracking', [TrackingController::class, 'tracking'])->name('tracking');

    // Need to check
    Route::resources([
        //configuration
        'adminconfigurationweb' => AdminconfigurationwebController::class,
        'adminconfigurationkey' => AdminconfigurationkeyController::class,
        'color' => ColorController::class,

        //    'user' => UserController::class,

        'role' => RoleController::class,

    ]);

    // System Info
    Route::get('/systeminfo', [AdminsettingsController::class, 'systeminfo'])->name('systeminfo');
    Route::get('/cacheclear', [AdminsettingsController::class, 'cacheclear'])->name('cacheclear');

    // Add Employee
    Route::get('/ajaxaddemployee', [AddemployeeController::class, 'ajaxaddemployee'])->name('ajaxaddemployee');
    Route::get('/profile', [AddemployeeController::class, 'profile'])->name('profile');
    Route::get('/changepasswordform', [AddemployeeController::class, 'changepasswordform'])->name('changepasswordform');
    Route::post('/changepassword', [AddemployeeController::class, 'changepassword'])->name('changepassword');

    Route::get('/2fa', [PasswordSecurityController::class, 'show2faForm'])->name('2fa');
    Route::post('/generate2faSecret', [PasswordSecurityController::class, 'generate2faSecret'])->name('generate2faSecret');
    Route::post('/2fa', [PasswordSecurityController::class, 'enable2fa'])->name('enable2fa');
    Route::post('/disable2fa', [PasswordSecurityController::class, 'disable2fa'])->name('disable2fa');
});
