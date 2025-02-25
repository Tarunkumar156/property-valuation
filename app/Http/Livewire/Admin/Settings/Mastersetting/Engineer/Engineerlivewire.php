<?php

namespace App\Http\Livewire\Admin\Settings\Mastersetting\Engineer;

use App\Http\Livewire\Livewirehelper\Datatable\datatableLivewireTrait;
use App\Http\Livewire\Livewirehelper\Miscellaneous\miscellaneousLivewireTrait;
use App\Models\Admin\Settings\Mastersetting\Engineer;
use App\Models\Miscellaneous\Helper;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;

class Engineerlivewire extends Component
{
    use datatableLivewireTrait, miscellaneousLivewireTrait, WithFileUploads;

    public $name, $image, $existing_image, $note, $address, $engineer_id;

    public $showdata;

    protected $listeners = ['formreset'];

    protected function rules()
    {
        return [
            'name' => 'required|min:2|max:70',
            'address' => 'required|min:5|max:250',
            'image' => $this->engineer_id ? 'nullable|image|mimes:jpeg,png,jpg|max:2048' : 'required|image|mimes:jpeg,png,jpg|max:2048',
            'note' => 'nullable|min:5|max:255',
        ];
    }

    public function store()
    {
        $validatedData = $this->validate();

        try {

            if ($this->engineer_id) {
                if ($this->image) {
                    $validatedData['image'] = $this->image->store('engineer', 'public');
                    if ($this->existing_image) {
                        Storage::delete('public/' . $this->existing_image);
                    }
                    $this->image = null;
                    $this->existing_image = $validatedData['image'];
                } else {
                    unset($validatedData['image']);
                }
                $engineer = Engineer::find($this->engineer_id);
                $engineer->update($validatedData);
                Helper::trackmessage(auth()->user(), $engineer, 'engineer_createoredit', session()->getId(), 'WEB', 'Engineer Setting Updated');
                $this->toaster('success', 'Engineer Setting Updated Successfully!!');
            } else {
                if ($this->image) {
                    $validatedData['image'] = $this->image->store('engineer', 'public');
                }
                $engineer = Engineer::create($validatedData);
                Helper::trackmessage(auth()->user(), $engineer, 'engineer_createoredit', session()->getId(), 'WEB', 'Engineer Setting Created');
                $this->toaster('success', 'Engineer Setting Created Successfully!!');
            }

            $this->formreset();
            $this->emit('closemodal');
        } catch (Exception $e) {
            $this->exceptionerror(auth()->user(), 'admin_engineer_createoredit', 'error_one : ' . $e->getMessage());
        } catch (QueryException $e) {
            $this->exceptionerror(auth()->user(), 'admin_engineer_createoredit', 'error_two : ' . $e->getMessage());
        } catch (PDOException $e) {
            $this->exceptionerror(auth()->user(), 'admin_engineer_createoredit', 'error_three : ' . $e->getMessage());
        }
    }

    protected function databind($engineerid, $type)
    {
        if ($type == 'edit') {
            $engineer = Engineer::find($engineerid);
            $this->name = $engineer->name;
            $this->address = $engineer->address;
            $this->image = null;
            $this->existing_image = $engineer->image;
            $this->note = $engineer->note;
            $this->engineer_id = $engineerid;
        } else {
            $this->showdata = Engineer::find($engineerid);
        }
    }

    public function formreset()
    {
        $this->name = $this->image = $this->existing_image = $this->address = $this->note = $this->engineer_id = null;
        $this->resetValidation();
    }

    public function render()
    {
        $engineer = Engineer::query()
            ->where(function ($query) {
                $query->where('name', 'like', '%' . $this->searchTerm . '%');
            })
            ->orderBy($this->sortColumnName, $this->sortDirection)
            ->paginate($this->paginationlength)
            ->onEachSide(1);
        return view('livewire.admin.settings.mastersetting.engineer.engineerlivewire', compact('engineer'));
    }
}
