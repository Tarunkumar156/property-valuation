<?php

namespace App\Http\Livewire\Admin\Settings\Mastersetting\Category;

use App\Http\Livewire\Livewirehelper\Datatable\datatableLivewireTrait;
use App\Http\Livewire\Livewirehelper\Miscellaneous\miscellaneousLivewireTrait;
use App\Models\Admin\Settings\Mastersetting\Category;
use App\Models\Miscellaneous\Helper;
use Livewire\Component;

class Categorylivewire extends Component
{
    use datatableLivewireTrait, miscellaneousLivewireTrait;

    public $name, $note;

    public $category_id;
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

            if ($this->category_id) {
                $category = Category::find($this->category_id);
                $category->update($validatedData);
                Helper::trackmessage(auth()->user(), $category, 'category_createoredit', session()->getId(), 'WEB', 'Category Setting Updated');
                $this->toaster('success', 'Category Setting Updated Successfully!!');
            } else {
                $category = Category::create($validatedData);
                Helper::trackmessage(auth()->user(), $category, 'category_createoredit', session()->getId(), 'WEB', 'Category Setting Created');
                $this->toaster('success', 'Category Setting Created Successfully!!');
            }

            $this->formreset();
            $this->emit('closemodal');
        } catch (Exception $e) {
            $this->exceptionerror(auth()->user(), 'admin_categorys_createoredit', 'error_one : ' . $e->getMessage());
        } catch (QueryException $e) {
            $this->exceptionerror(auth()->user(), 'admin_categorys_createoredit', 'error_two : ' . $e->getMessage());
        } catch (PDOException $e) {
            $this->exceptionerror(auth()->user(), 'admin_categorys_createoredit', 'error_three : ' . $e->getMessage());
        }
    }

    protected function databind($categoryid, $type)
    {
        if ($type == 'edit') {
            $category = Category::find($categoryid);
            $this->name = $category->name;
            $this->note = $category->note;
            $this->category_id = $categoryid;
        } else {
            $this->showdata = Category::find($categoryid);
        }
    }

    public function formreset()
    {
        $this->name = $this->note = $this->category_id = null;
        $this->resetValidation();
    }

    public function render()
    {
        $category = Category::query()
            ->where(function ($query) {
                $query->where('name', 'like', '%' . $this->searchTerm . '%');
            })
            ->orderBy($this->sortColumnName, $this->sortDirection)
            ->paginate($this->paginationlength)
            ->onEachSide(1);
        return view('livewire.admin.settings.mastersetting.category.categorylivewire',
            compact('category'));
    }
}
