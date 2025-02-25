<?php

namespace App\Http\Livewire\Admin\Settings\Mastersetting\Location;

use App\Http\Livewire\Livewirehelper\Datatable\datatableLivewireTrait;
use App\Http\Livewire\Livewirehelper\Miscellaneous\miscellaneousLivewireTrait;
use App\Models\Admin\Settings\Mastersetting\Location;
use App\Models\Miscellaneous\Helper;
use Livewire\Component;

class Locationlivewire extends Component
{
    use datatableLivewireTrait, miscellaneousLivewireTrait;

    public $name, $note;

    public $location_id;
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

            if ($this->location_id) {
                $location = Location::find($this->location_id);
                $location->update($validatedData);
                Helper::trackmessage(auth()->user(), $location, 'location_createoredit', session()->getId(), 'WEB', 'Location Setting Updated');
                $this->toaster('success', 'Location Setting Updated Successfully!!');
            } else {
                $location = Location::create($validatedData);
                Helper::trackmessage(auth()->user(), $location, 'location_createoredit', session()->getId(), 'WEB', 'Location Setting Created');
                $this->toaster('success', 'Location Setting Created Successfully!!');
            }

            $this->formreset();
            $this->emit('closemodal');
        } catch (Exception $e) {
            $this->exceptionerror(auth()->user(), 'admin_locations_createoredit', 'error_one : ' . $e->getMessage());
        } catch (QueryException $e) {
            $this->exceptionerror(auth()->user(), 'admin_locations_createoredit', 'error_two : ' . $e->getMessage());
        } catch (PDOException $e) {
            $this->exceptionerror(auth()->user(), 'admin_locations_createoredit', 'error_three : ' . $e->getMessage());
        }
    }

    protected function databind($locationid, $type)
    {
        if ($type == 'edit') {
            $location = Location::find($locationid);
            $this->name = $location->name;
            $this->note = $location->note;
            $this->location_id = $locationid;
        } else {
            $this->showdata = Location::find($locationid);
        }
    }

    public function formreset()
    {
        $this->name = $this->note = $this->location_id = null;
        $this->resetValidation();
    }

    public function render()
    {
        $location = Location::query()
            ->where(function ($query) {
                $query->where('name', 'like', '%' . $this->searchTerm . '%');
            })
            ->orderBy($this->sortColumnName, $this->sortDirection)
            ->paginate($this->paginationlength)
            ->onEachSide(1);
        return view('livewire.admin.settings.mastersetting.location.locationlivewire',
            compact('location'));
    }
}
