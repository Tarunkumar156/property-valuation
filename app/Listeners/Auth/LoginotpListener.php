<?php

namespace App\Listeners\Auth;

use App\Events\Auth\LoginotpEvent;
use App\Models\Customer\Auth\Customer;
use App\Notifications\Auth\LoginotpNotification;
use Illuminate\Support\Facades\Log;

class LoginotpListener
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle(LoginotpEvent $event)
    {
        switch ($event->message) {
            case 'New Customer OTP Api':
                Log::info('SendLoginOtpListener : ' . $event->message . ' ' . $event->otp . ' phone : ' . $event->phone);
                $user = new Customer;
                $user->notify(new LoginotpNotification($event->message, $event->phone, $event->otp));
                break;
            case 'Existing Customer OTP Api':
                Log::info('SendLoginOtpListener : ' . $event->message . ' ' . $event->otp . ' phone : ' . $event->phone);
                $user = new Customer;
                $user->notify(new LoginotpNotification($event->message, $event->phone, $event->otp));
                break;
            case 'Resend New Customer OTP Api':
                Log::info('SendLoginOtpListener : ' . $event->message . ' ' . $event->otp . ' phone : ' . $event->phone);
                $user = new Customer;
                $user->notify(new LoginotpNotification($event->message, $event->phone, $event->otp));
                break;
            case 'Resend Existing Customer OTP Api':
                Log::info('SendLoginOtpListener : ' . $event->message . ' ' . $event->otp . ' phone : ' . $event->phone);
                $user = new Customer;
                $user->notify(new LoginotpNotification($event->message, $event->phone, $event->otp));
                break;

            default:
                Log::error('Default Error Handle Api');
                Log::info('SendLoginOtpListener Existing: ' . $event->message . ' phone : ' . $event->phone);
                // $event->user->notify(new LoginotpNotification($event->message, $event->phone, $event->otp));
                break;
        }
    }
}
