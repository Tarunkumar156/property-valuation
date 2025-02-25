<?php

namespace App\Http\Livewire\Admin\Settings\Generalsetting\Smssetting;

use App\Http\Livewire\Livewirehelper\Datatable\datatableLivewireTrait;
use App\Http\Livewire\Livewirehelper\Miscellaneous\miscellaneousLivewireTrait;
use App\Models\Admin\Settings\Generalsettings\Smssetting;
use App\Models\Miscellaneous\Helper;
use Livewire\Component;

class Smssettinglivewire extends Component
{
    use datatableLivewireTrait, miscellaneousLivewireTrait;

    public $provider_name, $sid, $sender_id, $token, $url, $country_code, $phone_no, $is_default, $note;
    public $smssetting_id;
    public $showdata;

    protected $listeners = ['formreset'];

    protected function rules()
    {
        return [
            'provider_name' => 'required|min:5|max:70|unique:smssettings,provider_name,' . $this->smssetting_id,
            'sid' => 'required|min:5|max:70',
            'sender_id' => 'required|min:5|max:70',
            'token' => 'required|min:5|max:70',
            'url' => 'required|min:5|max:70',
            'country_code' => 'required|min:5|max:70',
            'phone_no' => 'required|numeric|digits:10',
            'is_default' => 'nullable|boolean',
            'note' => 'nullable|min:5|max:255',
        ];
    }

    public function store()
    {
        $validatedData = $this->validate();

        ($this->is_default == 1) ? Smssetting::where('is_default', true)->update(['is_default' => false]) : null;

        try {

            if ($this->smssetting_id) {
                $smssetting = Smssetting::find($this->smssetting_id);
                $smssetting->update($validatedData);
                Helper::trackmessage(auth()->user(), $smssetting, 'smssetting_createoredit', session()->getId(), 'WEB', 'SMS Setting Updated');
                $this->toaster('success', 'SMS Setting Updated Successfully!!');
            } else {
                $smssetting = Smssetting::create($validatedData);
                Helper::trackmessage(auth()->user(), $smssetting, 'smssetting_createoredit', session()->getId(), 'WEB', 'SMS Setting Created');
                $this->toaster('success', 'SMS Setting Created Successfully!!');
            }

            $this->formreset();
            $this->emit('closemodal');

        } catch (Exception $e) {
            $this->exceptionerror(auth()->user(), 'admin_smssettings_createoredit', 'error_one : ' . $e->getMessage());
        } catch (QueryException $e) {
            $this->exceptionerror(auth()->user(), 'admin_smssettings_createoredit', 'error_two : ' . $e->getMessage());
        } catch (PDOException $e) {
            $this->exceptionerror(auth()->user(), 'admin_smssettings_createoredit', 'error_three : ' . $e->getMessage());
        }
    }

    protected function databind($smssettingid, $type)
    {
        if ($type == 'edit') {
            $smssetting = Smssetting::find($smssettingid);
            $this->provider_name = $smssetting->provider_name;
            $this->sid = $smssetting->sid;
            $this->sender_id = $smssetting->sender_id;
            $this->token = $smssetting->token;
            $this->url = $smssetting->url;
            $this->country_code = $smssetting->country_code;
            $this->phone_no = $smssetting->phone_no;
            $this->is_default = $smssetting->is_default;
            $this->note = $smssetting->note;
            $this->smssetting_id = $smssettingid;
        } else {
            $this->showdata = Smssetting::find($smssettingid);
        }
    }

    public function formreset()
    {
        $this->provider_name = $this->sid = $this->sender_id =
        $this->token = $this->url = $this->country_code = $this->phone_no =
        $this->is_default = $this->note = $this->smssetting_id = null;

        $this->resetValidation();
    }

    public function render()
    {
        $smssetting = Smssetting::query()
            ->where(function ($query) {
                $query->where('provider_name', 'like', '%' . $this->searchTerm . '%')
                    ->orWhere('sender_id', 'like', '%' . $this->searchTerm . '%')
                    ->orWhere('country_code', 'like', '%' . $this->searchTerm . '%')
                    ->orWhere('phone_no', 'like', '%' . $this->searchTerm . '%');
            })
            ->orderBy($this->sortColumnName, $this->sortDirection)
            ->paginate($this->paginationlength)
            ->onEachSide(1);

        return view('livewire.admin.settings.generalsetting.smssetting.smssettinglivewire',
            compact('smssetting'));
    }
}
