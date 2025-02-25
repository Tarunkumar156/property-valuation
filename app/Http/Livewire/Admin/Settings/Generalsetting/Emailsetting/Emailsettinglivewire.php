<?php

namespace App\Http\Livewire\Admin\Settings\Generalsetting\Emailsetting;

use App\Http\Livewire\Livewirehelper\Datatable\datatableLivewireTrait;
use App\Http\Livewire\Livewirehelper\Miscellaneous\miscellaneousLivewireTrait;
use App\Models\Admin\Settings\Generalsettings\Emailsetting;
use App\Models\Miscellaneous\Helper;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class Emailsettinglivewire extends Component
{
    use datatableLivewireTrait, miscellaneousLivewireTrait;
    use AuthorizesRequests;

    public $provider_name, $email_from_name, $email_from_mail, $email_mail_driver,
    $email_mail_host, $email_mail_port, $email_mail_username, $email_mail_password,
    $email_mail_encryption, $is_default, $note;

    public $emailsetting_id;
    public $showdata;

    protected $listeners = ['formreset'];

    protected function rules()
    {
        return [
            'provider_name' => 'required|min:2|max:70',
            'email_from_name' => 'required|min:2|max:70',
            'email_from_mail' => 'required|email|min:2|max:70',
            'email_mail_driver' => 'required|min:2|max:70',
            'email_mail_host' => 'required|min:2|max:70',
            'email_mail_port' => 'required|min:2|max:70',
            'email_mail_username' => 'required|min:2|max:70',
            'email_mail_password' => 'required|min:2|max:70',
            'email_mail_encryption' => 'required|min:2|max:70',
            'is_default' => 'nullable|boolean',
            'note' => 'nullable|min:5|max:255',
        ];
    }

    public function store()
    {
        $validatedData = $this->validate();

        ($this->is_default == 1) ? Emailsetting::where('is_default', true)->update(['is_default' => false]) : null;

        try {
            DB::beginTransaction();

            if ($this->emailsetting_id) {
                $emailsetting = Emailsetting::find($this->emailsetting_id);
                $emailsetting->update($validatedData);
                Helper::trackmessage(auth()->user(), $emailsetting, 'emailsetting_createoredit', session()->getId(), 'WEB', 'Email Setting Updated');
                $this->toaster('success', 'Email Setting Updated Successfully!!');
            } else {
                $emailsetting = Emailsetting::create($validatedData);
                Helper::trackmessage(auth()->user(), $emailsetting, 'emailsetting_createoredit', session()->getId(), 'WEB', 'Email Setting Created');
                $this->toaster('success', 'Email Setting Created Successfully!!');
            }

            DB::commit();
            $this->formreset();
            $this->emit('closemodal');
        } catch (Exception $e) {
            $this->exceptionerror(auth()->user(), 'admin_emailsettings_createoredit', 'error_one : ' . $e->getMessage());
        } catch (QueryException $e) {
            $this->exceptionerror(auth()->user(), 'admin_emailsettings_createoredit', 'error_two : ' . $e->getMessage());
        } catch (PDOException $e) {
            $this->exceptionerror(auth()->user(), 'admin_emailsettings_createoredit', 'error_three : ' . $e->getMessage());
        }
    }

    protected function databind($emailsettingid, $type)
    {
        if ($type == 'edit') {
            $emailsetting = Emailsetting::find($emailsettingid);
            $this->provider_name = $emailsetting->provider_name;
            $this->email_from_name = $emailsetting->email_from_name;
            $this->email_from_mail = $emailsetting->email_from_mail;
            $this->email_mail_driver = $emailsetting->email_mail_driver;
            $this->email_mail_host = $emailsetting->email_mail_host;
            $this->email_mail_port = $emailsetting->email_mail_port;
            $this->email_mail_username = $emailsetting->email_mail_username;
            $this->email_mail_password = $emailsetting->email_mail_password;
            $this->email_mail_encryption = $emailsetting->email_mail_encryption;
            $this->is_default = $emailsetting->is_default;
            $this->note = $emailsetting->note;
            $this->emailsetting_id = $emailsettingid;
        } else {
            $this->showdata = Emailsetting::find($emailsettingid);
        }
    }

    public function formreset()
    {
        $this->provider_name = $this->email_from_name = $this->email_from_mail =
        $this->email_mail_driver = $this->email_mail_host = $this->email_mail_port =
        $this->email_mail_username = $this->email_mail_password = $this->email_mail_encryption =
        $this->is_default = $this->note = $this->emailsetting_id = null;

        $this->resetValidation();
    }

    public function render()
    {
        $emailsetting = Emailsetting::query()
            ->where(function ($query) {
                $query->where('provider_name', 'like', '%' . $this->searchTerm . '%')
                    ->orWhere('email_from_name', 'like', '%' . $this->searchTerm . '%')
                    ->orWhere('email_from_mail', 'like', '%' . $this->searchTerm . '%')
                    ->orWhere('email_mail_username', 'like', '%' . $this->searchTerm . '%');
            })
            ->orderBy($this->sortColumnName, $this->sortDirection)
            ->paginate($this->paginationlength)
            ->onEachSide(1);

        return view('livewire.admin.settings.generalsetting.emailsetting.emailsettinglivewire',
            compact('emailsetting'));
    }
}
