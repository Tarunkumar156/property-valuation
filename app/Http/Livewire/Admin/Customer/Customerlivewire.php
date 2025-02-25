<?php

namespace App\Http\Livewire\Admin\Customer;

use App\Http\Livewire\Livewirehelper\Datatable\datatableLivewireTrait;
use App\Http\Livewire\Livewirehelper\Miscellaneous\miscellaneousLivewireTrait;
use App\Models\Customer\Auth\Customer;
use App\Models\Miscellaneous\Helper;
use Livewire\Component;

class Customerlivewire extends Component
{

    use datatableLivewireTrait, miscellaneousLivewireTrait;

    public $name, $phone, $email, $address, $type, $contact_person_name, $contact_person_phone, $note;
    public $customer_id;
    public $showdata;

    protected $listeners = ['formreset'];

    protected function rules()
    {
        return [
            'name' => 'required|min:2|max:70',
            'phone' => 'required|max:20|unique:customers,phone,' . $this->customer_id,
            'email' => 'nullable|min:2|max:70|unique:customers,email,' . $this->customer_id,
            'type' => 'required|numeric',
            'contact_person_name' => 'required|max:40',
            'contact_person_phone' => 'required|max:20',
            'address' => 'nullable|max:255',
            'note' => 'nullable|max:255',
        ];
    }

    public function store()
    {
        $validatedData = $this->validate();

        try {

            if ($this->customer_id) {
                $customer = Customer::find($this->customer_id);
                $customer->update($validatedData);
                Helper::trackmessage(auth()->user(), $customer, 'customer_createoredit', session()->getId(), 'WEB', 'Customer Updated');
                $this->toaster('success', 'Customer Updated Successfully!!');
            } else {
                $customer = Customer::create($validatedData);
                Helper::trackmessage(auth()->user(), $customer, 'customer_createoredit', session()->getId(), 'WEB', 'Customer Created');
                $this->toaster('success', 'Customer Created Successfully!!');
            }

            $this->formreset();
            $this->emit('closemodal');
        } catch (Exception $e) {
            $this->exceptionerror(auth()->user(), 'admin_customers_createoredit', 'error_one : ' . $e->getMessage());
        } catch (QueryException $e) {
            $this->exceptionerror(auth()->user(), 'admin_customers_createoredit', 'error_two : ' . $e->getMessage());
        } catch (PDOException $e) {
            $this->exceptionerror(auth()->user(), 'admin_customers_createoredit', 'error_three : ' . $e->getMessage());
        }
    }

    protected function databind($customerid, $type)
    {
        if ($type == 'edit') {
            $customer = Customer::find($customerid);
            $this->name = $customer->name;
            $this->phone = $customer->phone;
            $this->email = $customer->email;
            $this->type = $customer->type;
            $this->contact_person_name = $customer->contact_person_name;
            $this->contact_person_phone = $customer->contact_person_phone;
            $this->address = $customer->address;
            $this->note = $customer->note;
            $this->customer_id = $customerid;
        } else {
            $this->showdata = Customer::find($customerid);
        }
    }

    public function formreset()
    {
        $this->name = $this->phone = $this->email = $this->type =
        $this->contact_person_name = $this->contact_person_phone =
        $this->address = $this->note = $this->customer_id = null;
        $this->resetValidation();
    }

    public function render()
    {
        $customer = Customer::query()
            ->where(fn($q) =>
                $q->where('uniqid', 'like', '%' . $this->searchTerm . '%')
                    ->orWhere('name', 'like', '%' . $this->searchTerm . '%')
                    ->orWhere('phone', 'like', '%' . $this->searchTerm . '%')
            )
            ->orderBy($this->sortColumnName, $this->sortDirection)
            ->paginate($this->paginationlength)
            ->onEachSide(1);
        return view('livewire.admin.customer.customerlivewire',
            compact('customer'));
    }

}
