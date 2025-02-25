<?php

namespace App\Providers;

use App\Repository\Customer\Api\Businesslogic\FCM\CustomerFCMApiRepository;
use App\Repository\Customer\Api\Businesslogic\Homepage\CustomerHomepageApiRepository;
use App\Repository\Customer\Api\Businesslogic\Loginandregister\CustomerAuthApiRepository;
use App\Repository\Customer\Api\Businesslogic\Profile\CustomerProfileApiRepository;
use App\Repository\Customer\Api\Businesslogic\Support\CustomerSupportApiRepository;
use App\Repository\Customer\Api\Interfacelayer\FCM\ICustomerFCMApiRepository;
use App\Repository\Customer\Api\Interfacelayer\Homepage\ICustomerHomepageApiRepository;
use App\Repository\Customer\Api\Interfacelayer\Loginandregister\ICustomerAuthApiRepository;
use App\Repository\Customer\Api\Interfacelayer\Profile\ICustomerProfileApiRepository;
use App\Repository\Customer\Api\Interfacelayer\Support\ICustomerSupportApiRepository;
use Illuminate\Support\ServiceProvider;

class CustomerApiRepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        // Customer Api
        $this->app->bind(ICustomerAuthApiRepository::class, CustomerAuthApiRepository::class);
        $this->app->bind(ICustomerHomepageApiRepository::class, CustomerHomepageApiRepository::class);
        $this->app->bind(ICustomerProfileApiRepository::class, CustomerProfileApiRepository::class);
        $this->app->bind(ICustomerSupportApiRepository::class, CustomerSupportApiRepository::class);
        $this->app->bind(ICustomerFCMApiRepository::class, CustomerFCMApiRepository::class);

    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
