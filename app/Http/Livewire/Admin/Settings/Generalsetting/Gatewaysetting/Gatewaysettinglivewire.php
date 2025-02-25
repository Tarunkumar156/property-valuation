<?php

namespace App\Http\Livewire\Admin\Settings\Generalsetting\Gatewaysetting;

use App\Http\Livewire\Livewirehelper\Datatable\datatableLivewireTrait;
use App\Http\Livewire\Livewirehelper\Miscellaneous\miscellaneousLivewireTrait;
use App\Models\Admin\Settings\Generalsettings\Gatewaysetting;
use App\Models\Miscellaneous\Helper;
use Livewire\Component;

class Gatewaysettinglivewire extends Component
{
    use datatableLivewireTrait, miscellaneousLivewireTrait;

    public $gateway_id, $gateway_name, $gateway_username, $gateway_secret_key, $gateway_publisher_key, $is_default, $note;
    public $gatewaysetting_id;
    public $showdata;

    protected $listeners = ['formreset'];

    protected function rules()
    {
        return [
            'gateway_name' => 'required|min:5|max:70',
            'gateway_username' => 'required|min:5|max:70',
            'gateway_secret_key' => 'required|min:5|max:150',
            'gateway_publisher_key' => 'required|min:5|max:150',
            'is_default' => 'nullable|boolean',
            'note' => 'nullable|min:5|max:255',
        ];
    }

    public function store()
    {
        $validatedData = $this->validate();

        ($this->is_default == 1) ? Gatewaysetting::where('is_default', true)->update(['is_default' => false]) : null;

        try {
            if ($this->gatewaysetting_id) {
                $gatewaysetting = Gatewaysetting::find($this->gatewaysetting_id);
                $gatewaysetting->update($validatedData);
                Helper::trackmessage(auth()->user(), $gatewaysetting, 'gatewaysetting_createoredit', session()->getId(), 'WEB', 'Gateway Setting Updated');
                $this->toaster('success', 'Gateway Setting Updated Successfully!!');
            } else {
                $gatewaysetting = Gatewaysetting::create($validatedData);
                Helper::trackmessage(auth()->user(), $gatewaysetting, 'gatewaysetting_createoredit', session()->getId(), 'WEB', 'Gateway Setting Created');
                $this->toaster('success', 'Gateway Setting Created Successfully!!');
            }

            $this->formreset();
            $this->emit('closemodal');

        } catch (Exception $e) {
            $this->exceptionerror(auth()->user(), 'admin_gatewaysettings_createoredit', 'error_one : ' . $e->getMessage());
        } catch (QueryException $e) {
            $this->exceptionerror(auth()->user(), 'admin_gatewaysettings_createoredit', 'error_two : ' . $e->getMessage());
        } catch (PDOException $e) {
            $this->exceptionerror(auth()->user(), 'admin_gatewaysettings_createoredit', 'error_three : ' . $e->getMessage());
        }
    }

    protected function databind($gatewaysettingid, $type)
    {
        if ($type == 'edit') {
            $gatewaysetting = Gatewaysetting::find($gatewaysettingid);
            $this->gateway_id = $gatewaysetting->gateway_id;
            $this->gateway_name = $gatewaysetting->gateway_name;
            $this->gateway_username = $gatewaysetting->gateway_username;
            $this->gateway_secret_key = $gatewaysetting->gateway_secret_key;
            $this->gateway_publisher_key = $gatewaysetting->gateway_publisher_key;
            $this->is_default = $gatewaysetting->is_default;
            $this->note = $gatewaysetting->note;
            $this->gatewaysetting_id = $gatewaysettingid;
        } else {
            $this->showdata = Gatewaysetting::find($gatewaysettingid);
        }
    }

    public function formreset()
    {

        $this->gateway_id = $this->gateway_name = $this->gateway_username =
        $this->gateway_secret_key = $this->gateway_publisher_key =
        $this->is_default = $this->note = $this->gatewaysetting_id = null;

        $this->resetValidation();
    }

    public function render()
    {
        $gatewaysetting = Gatewaysetting::query()
            ->where(function ($query) {
                $query->where('gateway_name', 'like', '%' . $this->searchTerm . '%')
                    ->orWhere('gateway_username', 'like', '%' . $this->searchTerm . '%');
            })
            ->orderBy($this->sortColumnName, $this->sortDirection)
            ->paginate($this->paginationlength)
            ->onEachSide(1);

        return view('livewire.admin.settings.generalsetting.gatewaysetting.gatewaysettinglivewire',
            compact('gatewaysetting'));
    }
}
