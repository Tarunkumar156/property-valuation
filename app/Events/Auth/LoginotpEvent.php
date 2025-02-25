<?php

namespace App\Events\Auth;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class LoginotpEvent
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $message, $phone, $otp;
    /**
     * Create a new event instance.
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
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new PrivateChannel('channel-name');
    }
}
