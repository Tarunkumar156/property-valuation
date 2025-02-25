<?php

namespace App\Http\Livewire\Admin\Settings\Mastersetting\Experience;

use App\Http\Livewire\Livewirehelper\Datatable\datatableLivewireTrait;
use App\Http\Livewire\Livewirehelper\Miscellaneous\miscellaneousLivewireTrait;
use App\Models\Admin\Settings\Mastersetting\Experience;
use App\Models\Miscellaneous\Helper;
use Livewire\Component;

class Experiencelivewire extends Component
{
    use datatableLivewireTrait, miscellaneousLivewireTrait;

    public $name, $note;

    public $experience_id;
    public $showdata;

    protected $listeners = ['formreset'];

    protected function rules()
    {
        return [
            'name' => 'required|min:2|max:70',
            'note' => 'nullable|min:5|max:255',
        ];
    }

    public function store()
    {
        $validatedData = $this->validate();

        try {

            if ($this->experience_id) {
                $experience = Experience::find($this->experience_id);
                $experience->update($validatedData);
                Helper::trackmessage(auth()->user(), $experience, 'experience_createoredit', session()->getId(), 'WEB', 'Experience Setting Updated');
                $this->toaster('success', 'Experience Setting Updated Successfully!!');
            } else {
                $experience = Experience::create($validatedData);
                Helper::trackmessage(auth()->user(), $experience, 'experience_createoredit', session()->getId(), 'WEB', 'Experience Setting Created');
                $this->toaster('success', 'Experience Setting Created Successfully!!');
            }

            $this->formreset();
            $this->emit('closemodal');
        } catch (Exception $e) {
            $this->exceptionerror(auth()->user(), 'admin_experiences_createoredit', 'error_one : ' . $e->getMessage());
        } catch (QueryException $e) {
            $this->exceptionerror(auth()->user(), 'admin_experiences_createoredit', 'error_two : ' . $e->getMessage());
        } catch (PDOException $e) {
            $this->exceptionerror(auth()->user(), 'admin_experiences_createoredit', 'error_three : ' . $e->getMessage());
        }
    }

    protected function databind($experienceid, $type)
    {
        if ($type == 'edit') {
            $experience = Experience::find($experienceid);
            $this->name = $experience->name;
            $this->note = $experience->note;
            $this->experience_id = $experienceid;
        } else {
            $this->showdata = Experience::find($experienceid);
        }
    }

    public function formreset()
    {
        $this->name = $this->note = $this->experience_id = null;
        $this->resetValidation();
    }

    public function render()
    {
        $experience = Experience::query()
            ->where(function ($query) {
                $query->where('name', 'like', '%' . $this->searchTerm . '%');
            })
            ->orderBy($this->sortColumnName, $this->sortDirection)
            ->paginate($this->paginationlength)
            ->onEachSide(1);
        return view('livewire.admin.settings.mastersetting.experience.experiencelivewire',
            compact('experience'));
    }
}
