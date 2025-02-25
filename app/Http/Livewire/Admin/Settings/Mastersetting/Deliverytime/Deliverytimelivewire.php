<?php

namespace App\Http\Livewire\Admin\Settings\Mastersetting\Deliverytime;

use App\Http\Livewire\Livewirehelper\Datatable\datatableLivewireTrait;
use App\Http\Livewire\Livewirehelper\Miscellaneous\miscellaneousLivewireTrait;
use App\Models\Admin\Settings\Mastersetting\Deliverytime;
use App\Models\Miscellaneous\Helper;
use Livewire\Component;

class Deliverytimelivewire extends Component
{
    use datatableLivewireTrait, miscellaneousLivewireTrait;

    public $name, $note;

    public $deliverytime_id;
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

            if ($this->deliverytime_id) {
                $deliverytime = Deliverytime::find($this->deliverytime_id);
                $deliverytime->update($validatedData);
                Helper::trackmessage(auth()->user(), $deliverytime, 'deliverytime_createoredit', session()->getId(), 'WEB', 'Deliverytime Setting Updated');
                $this->toaster('success', 'Deliverytime Setting Updated Successfully!!');
            } else {
                $deliverytime = Deliverytime::create($validatedData);
                Helper::trackmessage(auth()->user(), $deliverytime, 'deliverytime_createoredit', session()->getId(), 'WEB', 'Deliverytime Setting Created');
                $this->toaster('success', 'Deliverytime Setting Created Successfully!!');
            }

            $this->formreset();
            $this->emit('closemodal');
        } catch (Exception $e) {
            $this->exceptionerror(auth()->user(), 'admin_deliverytimes_createoredit', 'error_one : ' . $e->getMessage());
        } catch (QueryException $e) {
            $this->exceptionerror(auth()->user(), 'admin_deliverytimes_createoredit', 'error_two : ' . $e->getMessage());
        } catch (PDOException $e) {
            $this->exceptionerror(auth()->user(), 'admin_deliverytimes_createoredit', 'error_three : ' . $e->getMessage());
        }
    }

    protected function databind($deliverytimeid, $type)
    {
        if ($type == 'edit') {
            $deliverytime = Deliverytime::find($deliverytimeid);
            $this->name = $deliverytime->name;
            $this->note = $deliverytime->note;
            $this->deliverytime_id = $deliverytimeid;
        } else {
            $this->showdata = Deliverytime::find($deliverytimeid);
        }
    }

    public function formreset()
    {
        $this->name = $this->note = $this->deliverytime_id = null;
        $this->resetValidation();
    }

    public function render()
    {
        $deliverytime = Deliverytime::query()
            ->where(function ($query) {
                $query->where('name', 'like', '%' . $this->searchTerm . '%');
            })
            ->orderBy($this->sortColumnName, $this->sortDirection)
            ->paginate($this->paginationlength)
            ->onEachSide(1);
        return view('livewire.admin.settings.mastersetting.deliverytime.deliverytimelivewire',
            compact('deliverytime'));
    }
}
