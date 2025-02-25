<?php

namespace App\Http\Livewire\Admin\Valuation\Valuation;

use App\Http\Livewire\Livewirehelper\Datatable\datatableLivewireTrait;
use App\Http\Livewire\Livewirehelper\Miscellaneous\miscellaneousLivewireTrait;
use App\Models\Admin\Settings\Mastersetting\Category;
use App\Models\Admin\Valuation\Valuation;
use App\Models\Customer\Auth\Customer;
use App\Models\Miscellaneous\Helper;
use Livewire\Component;

class Valuationlivewire extends Component
{
    use datatableLivewireTrait, miscellaneousLivewireTrait;

    public $name, $latitude, $logitude, $googlemaplocation, $threewordlocation, $customer_id, $category_id, $note;
    public $customerlist = [], $categorylist = [];
    public $valuation_id;
    public $showdata;

    protected $listeners = ['formreset'];

    protected function rules()
    {
        return [
            'name' => 'required|min:2|max:70',
            'latitude' => 'nullable|min:2|max:70',
            'logitude' => 'nullable|min:2|max:70',
            'googlemaplocation' => 'nullable|min:2|max:70',
            'threewordlocation' => 'nullable|min:2|max:70',
            'customer_id' => 'required',
            'category_id' => 'required',
            'note' => 'nullable|min:5|max:255',
        ];
    }

    public function mount()
    {
        $this->customerlist = Customer::where('active', true)->pluck('name', 'id');
        $this->categorylist = Category::where('active', true)->pluck('name', 'id');
    }

    public function store()
    {
        $validatedData = $this->validate();

        try {

            if ($this->valuation_id) {
                $valuation = Valuation::find($this->valuation_id);
                $valuation->update($validatedData);
                Helper::trackmessage(auth()->user(), $valuation, 'valuation_createoredit', session()->getId(), 'WEB', 'Valuation Updated');
                $this->toaster('success', 'Valuation Updated Successfully!!');
            } else {
                $valuation = Valuation::create($validatedData);
                Helper::trackmessage(auth()->user(), $valuation, 'valuation_createoredit', session()->getId(), 'WEB', 'Valuation Created');
                $this->toaster('success', 'Valuation Created Successfully!!');
            }

            $this->formreset();
            $this->emit('closemodal');
        } catch (Exception $e) {
            $this->exceptionerror(auth()->user(), 'admin_valuations_createoredit', 'error_one : ' . $e->getMessage());
        } catch (QueryException $e) {
            $this->exceptionerror(auth()->user(), 'admin_valuations_createoredit', 'error_two : ' . $e->getMessage());
        } catch (PDOException $e) {
            $this->exceptionerror(auth()->user(), 'admin_valuations_createoredit', 'error_three : ' . $e->getMessage());
        }
    }

    protected function databind($valuationid, $type)
    {
        if ($type == 'edit') {
            $valuation = Valuation::find($valuationid);
            $this->name = $valuation->name;
            $this->latitude = $valuation->latitude;
            $this->logitude = $valuation->logitude;
            $this->googlemaplocation = $valuation->googlemaplocation;
            $this->threewordlocation = $valuation->threewordlocation;
            $this->customer_id = $valuation->customer_id;
            $this->category_id = $valuation->category_id;
            $this->note = $valuation->note;
            $this->valuation_id = $valuationid;
        } else {
            $this->showdata = Valuation::find($valuationid);
        }
    }

    public function formreset()
    {
        $this->name = $this->note = $this->valuation_id =
        $this->latitude = $this->logitude = $this->googlemaplocation =
        $this->threewordlocation = $this->customer_id = $this->category_id = null;
        $this->resetValidation();
    }

    public function render()
    {
        $valuation = Valuation::query()
            ->where(function ($query) {
                $query->where('name', 'like', '%' . $this->searchTerm . '%');
            })
            ->orderBy($this->sortColumnName, $this->sortDirection)
            ->paginate($this->paginationlength)
            ->onEachSide(1);
        return view('livewire.admin.valuation.valuation.valuationlivewire',
            compact('valuation'));
    }

}
