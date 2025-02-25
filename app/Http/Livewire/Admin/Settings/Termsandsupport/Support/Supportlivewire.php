<?php

namespace App\Http\Livewire\Admin\Settings\Termsandsupport\Support;

use App\Http\Livewire\Livewirehelper\Datatable\datatableLivewireTrait;
use App\Http\Livewire\Livewirehelper\Miscellaneous\miscellaneousLivewireTrait;
use App\Models\Admin\Settings\Termsandsupport\Support;
use App\Models\Miscellaneous\Helper;
use Livewire\Component;

class Supportlivewire extends Component
{
    use datatableLivewireTrait, miscellaneousLivewireTrait;

    public $panel, $type, $slug, $description, $note;
    public $support_id;
    public $showdata;

    protected $listeners = ['formreset'];

    protected function rules()
    {
        return [
            'panel' => 'required|min:2|max:70',
            'slug' => 'required|min:2|max:150',
            'type' => 'required',
            'description' => 'required|min:5|max:1300',
            'note' => 'nullable|min:5|max:255',
        ];
    }

    public function store()
    {
        $validatedData = $this->validate();

        try {

            if ($this->support_id) {
                $support = Support::find($this->support_id);
                $support->update($validatedData);
                Helper::trackmessage(auth()->user(), $support, 'support_createoredit', session()->getId(), 'WEB', 'Support Setting Updated');
                $this->toaster('success', 'Support Setting Updated Successfully!!');
            } else {
                $support = Support::create($validatedData);
                Helper::trackmessage(auth()->user(), $support, 'support_createoredit', session()->getId(), 'WEB', 'Support Setting Created');
                $this->toaster('success', 'Support Setting Created Successfully!!');
            }

            $this->formreset();
            $this->emit('closemodal');
        } catch (Exception $e) {
            $this->exceptionerror(auth()->user(), 'admin_supports_createoredit', 'error_one : ' . $e->getMessage());
        } catch (QueryException $e) {
            $this->exceptionerror(auth()->user(), 'admin_supports_createoredit', 'error_two : ' . $e->getMessage());
        } catch (PDOException $e) {
            $this->exceptionerror(auth()->user(), 'admin_supports_createoredit', 'error_three : ' . $e->getMessage());
        }
    }

    protected function databind($supportid, $type)
    {
        if ($type == 'edit') {
            $support = Support::find($supportid);
            $this->panel = $support->panel;
            $this->type = $support->type;
            $this->slug = $support->slug;
            $this->description = $support->description;
            $this->note = $support->note;
            $this->support_id = $supportid;
        } else {
            $this->showdata = Support::find($supportid);
        }
    }

    public function formreset()
    {
        $this->panel = $this->type = $this->slug = $this->description =
        $this->note = $this->support_id = null;
        $this->resetValidation();
    }

    public function render()
    {
        $support = Support::query()
            ->where(function ($query) {
                $query->where('panel', 'like', '%' . $this->searchTerm . '%');
            })
            ->orderBy($this->sortColumnName, $this->sortDirection)
            ->paginate($this->paginationlength)
            ->onEachSide(1);

        return view('livewire.admin.settings.termsandsupport.support.supportlivewire',
            compact('support'));
    }
}
