<?php

namespace App\Http\Livewire\Livewirehelper\Miscellaneous;

use App\Models\Miscellaneous\Helper;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

trait miscellaneousLivewireTrait
{
    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    protected function toaster($type, $message)
    {
        $this->dispatchBrowserEvent('alert',
            ['type' => $type, 'message' => $message]);
    }

    protected function exceptionerror($user, $function, $trackmsg)
    {
        DB::rollback();
        Log::error("SessionID: " . session()->getId() . ' Exception ' . $function . ' ' . $trackmsg);
        Helper::trackmessage($user, $trackmsg, $function, session()->getId(), 'WEB');
        $this->toaster('error', $e->getMessage());
    }
}
