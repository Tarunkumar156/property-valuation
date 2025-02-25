<?php

namespace App\Http\Livewire\Admin\Settings\Otp\Otphistory;

use App\Http\Livewire\Livewirehelper\Datatable\datatableLivewireTrait;
use App\Models\Admin\Settings\Otp\Otphistory;
use Livewire\Component;

class Otphistorylivewire extends Component
{
    use datatableLivewireTrait;

    public function render()
    {
        $otphistory = Otphistory::query()
            ->where(fn($q) =>
                $q->where('panel', 'like', '%' . $this->searchTerm . '%')
                    ->orWhere('details', 'like', '%' . $this->searchTerm . '%')
                    ->orWhere('phone', 'like', '%' . $this->searchTerm . '%')
                    ->orWhere('otp', 'like', '%' . $this->searchTerm . '%')
            )
            ->orderBy($this->sortColumnName, $this->sortDirection)
            ->paginate($this->paginationlength)
            ->onEachSide(1);

        return view('livewire.admin.settings.otp.otphistory.otphistorylivewire',
            compact('otphistory'));
    }
}
