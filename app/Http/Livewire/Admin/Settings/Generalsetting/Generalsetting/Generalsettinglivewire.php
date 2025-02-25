<?php

namespace App\Http\Livewire\Admin\Settings\Generalsetting\Generalsetting;

use App\Http\Livewire\Livewirehelper\Miscellaneous\miscellaneousLivewireTrait;
use App\Models\Admin\Settings\Generalsettings\Generalsetting;
use Livewire\Component;
use Livewire\WithFileUploads;

class Generalsettinglivewire extends Component
{
    use miscellaneousLivewireTrait;
    use WithFileUploads;

    public $companyfullname, $companyshortname, $phone, $email, $address;

    public function mount()
    {
        $this->databind();
    }

    protected function rules()
    {
        return [
            'companyfullname' => 'bail|required|min:5|max:70',
            'companyshortname' => 'bail|required|min:5|max:70',
            'address' => 'bail|required|max:255',
            'phone' => 'bail|required|min:7|max:13',
            'email' => 'bail|required|email',
        ];
    }

    public function store()
    {
        $validatedData = $this->validate();

        try {
            $generalsetting = Generalsetting::first();
            $generalsetting->update($validatedData);
            Helper::trackmessage(auth()->user(), $generalsetting, 'generalsetting_createoredit', session()->getId(), 'WEB', 'General Setting Updated');
            $this->toaster('success', 'General Settings Updated Successfully!!');
            $this->formreset();
            $this->emit('closemodal');
        } catch (Exception $e) {
            $this->exceptionerror($user, 'admin_general_settings', 'error_one : ' . $e->getMessage());
        } catch (QueryException $e) {
            $this->exceptionerror($user, 'admin_general_settings', 'error_two : ' . $e->getMessage());
        } catch (PDOException $e) {
            $this->exceptionerror($user, 'admin_general_settings', 'error_three : ' . $e->getMessage());
        }
    }

    protected function databind()
    {
        $generalsetting = Generalsetting::first();
        $this->companyfullname = $generalsetting->companyfullname;
        $this->companyshortname = $generalsetting->companyshortname;
        $this->phone = $generalsetting->phone;
        $this->email = $generalsetting->email;
        $this->address = $generalsetting->address;
    }

    protected function formreset()
    {
        $companyfullname = $companyshortname = $phone = $email = $address = null;
        $this->resetValidation();
    }

    public function onclickformreset()
    {
        $this->databind();
        $this->resetValidation();
        $this->toaster('warning', 'Oops! General Settings Discarded Done');
    }

    public function render()
    {
        return view('livewire.admin.settings.generalsetting.generalsetting.generalsettinglivewire');
    }
}
