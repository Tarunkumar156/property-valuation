<?php

namespace App\Http\Livewire\Admin\Settings\Mastersetting\Rating;

use App\Http\Livewire\Livewirehelper\Datatable\datatableLivewireTrait;
use App\Http\Livewire\Livewirehelper\Miscellaneous\miscellaneousLivewireTrait;
use App\Models\Admin\Settings\Mastersetting\Rating;
use App\Models\Miscellaneous\Helper;
use Livewire\Component;

class Ratinglivewire extends Component
{
    use datatableLivewireTrait, miscellaneousLivewireTrait;

    public $name, $note;

    public $rating_id;
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

            if ($this->rating_id) {
                $rating = Rating::find($this->rating_id);
                $rating->update($validatedData);
                Helper::trackmessage(auth()->user(), $rating, 'rating_createoredit', session()->getId(), 'WEB', 'Rating Setting Updated');
                $this->toaster('success', 'Rating Setting Updated Successfully!!');
            } else {
                $rating = Rating::create($validatedData);
                Helper::trackmessage(auth()->user(), $rating, 'rating_createoredit', session()->getId(), 'WEB', 'Rating Setting Created');
                $this->toaster('success', 'Rating Setting Created Successfully!!');
            }

            $this->formreset();
            $this->emit('closemodal');
        } catch (Exception $e) {
            $this->exceptionerror(auth()->user(), 'admin_ratings_createoredit', 'error_one : ' . $e->getMessage());
        } catch (QueryException $e) {
            $this->exceptionerror(auth()->user(), 'admin_ratings_createoredit', 'error_two : ' . $e->getMessage());
        } catch (PDOException $e) {
            $this->exceptionerror(auth()->user(), 'admin_ratings_createoredit', 'error_three : ' . $e->getMessage());
        }
    }

    protected function databind($ratingid, $type)
    {
        if ($type == 'edit') {
            $rating = Rating::find($ratingid);
            $this->name = $rating->name;
            $this->note = $rating->note;
            $this->rating_id = $ratingid;
        } else {
            $this->showdata = Rating::find($ratingid);
        }
    }

    public function formreset()
    {
        $this->name = $this->note = $this->rating_id = null;
        $this->resetValidation();
    }

    public function render()
    {
        $rating = Rating::query()
            ->where(function ($query) {
                $query->where('name', 'like', '%' . $this->searchTerm . '%');
            })
            ->orderBy($this->sortColumnName, $this->sortDirection)
            ->paginate($this->paginationlength)
            ->onEachSide(1);
        return view('livewire.admin.settings.mastersetting.rating.ratinglivewire',
            compact('rating'));
    }
}
