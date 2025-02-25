<?php

namespace App\Http\Livewire\Admin\Settings\Generalsetting\Fcmsetting;

use App\Http\Livewire\Livewirehelper\Datatable\datatableLivewireTrait;
use App\Http\Livewire\Livewirehelper\Miscellaneous\miscellaneousLivewireTrait;
use App\Models\Admin\Settings\Generalsettings\Fcmsetting;
use App\Models\Miscellaneous\Helper;
use Livewire\Component;

class Fcmsettinglivewire extends Component
{
    use datatableLivewireTrait, miscellaneousLivewireTrait;

    public $gateway_id, $gateway_name, $gateway_username, $gateway_secret_key, $gateway_publisher_key, $is_default, $note;
    public $fcmsetting_id;
    public $showdata;

    protected $listeners = ['formreset'];

    protected function rules()
    {
        return [
            'email' => 'required|min:5|max:70',
            'serverkey' => 'required|min:5|max:255',
            'is_default' => 'nullable|boolean',
            'note' => 'nullable|min:5|max:255',
        ];
    }

    public function store()
    {
        $validatedData = $this->validate();

        ($this->is_default == 1) ? Fcmsetting::where('is_default', true)->update(['is_default' => false]) : null;

        try {

            if ($this->fcmsetting_id) {
                $fcmsetting = Fcmsetting::find($this->fcmsetting_id);
                $fcmsetting->update($validatedData);
                Helper::trackmessage(auth()->user(), $fcmsetting, 'fcmsetting_createoredit', session()->getId(), 'WEB', 'FCM Setting Updated');
                $this->toaster('success', 'FCM Setting Updated Successfully!!');
            } else {
                $fcmsetting = Fcmsetting::create($validatedData);
                Helper::trackmessage(auth()->user(), $fcmsetting, 'fcmsetting_createoredit', session()->getId(), 'WEB', 'FCM Setting Created');
                $this->toaster('success', 'FCM Setting Created Successfully!!');
            }

            $this->formreset();
            $this->emit('closemodal');

        } catch (Exception $e) {
            $this->exceptionerror(auth()->user(), 'admin_fcmsettings_createoredit', 'error_one : ' . $e->getMessage());
        } catch (QueryException $e) {
            $this->exceptionerror(auth()->user(), 'admin_fcmsettings_createoredit', 'error_two : ' . $e->getMessage());
        } catch (PDOException $e) {
            $this->exceptionerror(auth()->user(), 'admin_fcmsettings_createoredit', 'error_three : ' . $e->getMessage());
        }
    }

    protected function databind($fcmsettingid, $type)
    {
        if ($type == 'edit') {
            $fcmsetting = Fcmsetting::find($fcmsettingid);
            $this->email = $fcmsetting->email;
            $this->serverkey = $fcmsetting->serverkey;
            $this->is_default = $fcmsetting->is_default;
            $this->note = $fcmsetting->note;
            $this->fcmsetting_id = $fcmsettingid;
        } else {
            $this->showdata = Fcmsetting::find($fcmsettingid);
        }
    }

    public function formreset()
    {
        $this->email = $this->serverkey = $this->is_default =
        $this->note = $this->fcmsetting_id = null;

        $this->resetValidation();
    }

    public function render()
    {
        $fcmsetting = Fcmsetting::query()
            ->where(function ($query) {
                $query->where('email', 'like', '%' . $this->searchTerm . '%')
                    ->orWhere('serverkey', 'like', '%' . $this->searchTerm . '%');
            })
            ->orderBy($this->sortColumnName, $this->sortDirection)
            ->paginate($this->paginationlength)
            ->onEachSide(1);
        return view('livewire.admin.settings.generalsetting.fcmsetting.fcmsettinglivewire',
            compact('fcmsetting'));
    }
}
