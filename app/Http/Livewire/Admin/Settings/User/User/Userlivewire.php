<?php

namespace App\Http\Livewire\Admin\Settings\User\User;

use App\Http\Livewire\Livewirehelper\Datatable\datatableLivewireTrait;
use App\Http\Livewire\Livewirehelper\Miscellaneous\miscellaneousLivewireTrait;
use App\Models\Admin\Auth\User;
use App\Models\Miscellaneous\Helper;
use DB;
use Livewire\Component;
use Livewire\WithFileUploads;

class Userlivewire extends Component
{
    use datatableLivewireTrait, miscellaneousLivewireTrait;
    use WithFileUploads;

    public $name, $phone, $email, $avatar, $password, $password_confirmation, $note;
    public $user_id;
    public $showdata;

    protected $listeners = ['formreset'];

    protected function rules()
    {
        return [
            'name' => 'required|min:6',
            'email' => 'required|email|unique:users,email,' . $this->user_id,
            'phone' => 'required|digits:10|numeric|unique:users,phone,' . $this->user_id,
            'avatar' => 'nullable|image|max:1024',
            'note' => 'nullable|max:255',
        ];
    }

    protected function customvalidation()
    {
        $validatedData = $this->validate();

        if (!$this->user_id) {
            $validatedData = array_merge($validatedData,
                $this->validate(['password' => 'required|string|min:2|confirmed']));
        }
        return $validatedData;
    }

    public function store()
    {

        $validatedData = $this->customvalidation();
        try {
            DB::beginTransaction();

            if ($this->user_id) {
                $user = User::find($this->user_id);
                $user->update($validatedData);
                Helper::trackmessage(auth()->user(), $user, 'admin_user_createoredit', session()->getId(), 'WEB', 'User Updated');
                $this->toaster('success', 'User Updated Successfully!!');
            } else {
                $user = User::create($validatedData);
                Helper::trackmessage(auth()->user(), $user, 'admin_user_createoredit', session()->getId(), 'WEB', 'User Created');
                $this->toaster('success', 'User Created Successfully!!');
            }

            DB::commit();
            $this->formreset();
            $this->emit('closemodal');
        } catch (Exception $e) {
            $this->exceptionerror(auth()->user(), 'admin_user_createoredit', 'error_one : ' . $e->getMessage());
        } catch (QueryException $e) {
            $this->exceptionerror(auth()->user(), 'admin_user_createoredit', 'error_two : ' . $e->getMessage());
        } catch (PDOException $e) {
            $this->exceptionerror(auth()->user(), 'admin_user_createoredit', 'error_three : ' . $e->getMessage());
        }
    }

    public function edit($user_id)
    {
        $this->formreset();
        $this->databind($user_id, 'edit');
        $this->emit('editmodal');
    }

    public function show($user_id)
    {
        $this->databind($user_id, 'show');
        $this->emit('showmodal');
    }

    protected function databind($user_id, $type)
    {

        if ($type == 'edit') {
            $user = User::find($user_id);
            $this->user_id = $user_id;
            $this->name = $user->name;
            $this->phone = $user->phone;
            $this->email = $user->email;
            $this->avatar = $user->avatar;
            $this->note = $user->note;
        } else {
            $this->showdata = User::find($user_id);
        }
    }

    public function formreset()
    {
        $this->name = $this->phone = $this->email
        = $this->avatar = $this->password = $this->password_confirmation
        = $this->note = $this->user_id = null;
        $this->resetValidation();
    }

    public function render()
    {
        $user = User::query()
            ->where(function ($query) {
                $query->where('name', 'like', '%' . $this->searchTerm . '%')
                    ->orWhere('phone', 'like', '%' . $this->searchTerm . '%')
                    ->orWhere('uniqid', 'like', '%' . $this->searchTerm . '%')
                    ->orWhere('email', 'like', '%' . $this->searchTerm . '%');
            })
            ->orderBy($this->sortColumnName, $this->sortDirection)
            ->paginate($this->paginationlength)
            ->onEachSide(1);

        return view('livewire.admin.settings.user.user.userlivewire', compact('user'));
    }
}
