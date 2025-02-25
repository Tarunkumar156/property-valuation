<?php

namespace App\Notifications\Auth;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Messages\SlackMessage;
use Illuminate\Notifications\Notification;
use Illuminate\Support\Facades\Log;

class LoginotpNotification extends Notification
{
    use Queueable;

    public $message, $phone, $otp;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($message, $phone, $otp)
    {
        $this->message = $message;
        $this->phone = $phone;
        $this->otp = $otp;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['slack'];
    }

    public function toSlack($notifiable)
    {

        Log::info('------SMS ---- : ' . $this->message . ' ' . $this->otp);
        $message = 'Dear Customer, Your ' . env('APP_NAME') . ' time password for login is ' . $this->otp;
        // Smshelper::bashsms($message, $this->phone);

        Log::info('loginOtpNotification - toSlack : ' . $this->message . ' ' . $this->otp);
        return (new SlackMessage)
            ->from('Ghost', ':ghost:')
            ->content(env('APP_NAME') . ' ' . $this->message . ' : ' . $this->otp);
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->line('The introduction to the notification.')
            ->action('Notification Action', url('/'))
            ->line('Thank you for using our application!');
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
