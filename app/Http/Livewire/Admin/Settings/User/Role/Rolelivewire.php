<?php

namespace App\Http\Livewire\Admin\Settings\User\Role;

use App\Http\Livewire\Livewirehelper\Datatable\datatableLivewireTrait;
use App\Http\Livewire\Livewirehelper\Miscellaneous\miscellaneousLivewireTrait;
use App\Models\Admin\Settings\Mastersetting\Board;
use Livewire\Component;

class Rolelivewire extends Component
{
    use datatableLivewireTrait, miscellaneousLivewireTrait;

    public $name, $note;

    public $board_id;
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

            if ($this->board_id) {
                $board = Board::find($this->board_id);
                $board->update($validatedData);
                Helper::trackmessage(auth()->user(), $board, 'board_createoredit', session()->getId(), 'WEB', 'Board Setting Updated');
                $this->toaster('success', 'Board Setting Updated Successfully!!');
            } else {
                $board = Board::create($validatedData);
                Helper::trackmessage(auth()->user(), $board, 'board_createoredit', session()->getId(), 'WEB', 'Board Setting Created');
                $this->toaster('success', 'Board Setting Created Successfully!!');
            }

            $this->formreset();
            $this->emit('closemodal');
        } catch (Exception $e) {
            $this->exceptionerror(auth()->user(), 'admin_boards_createoredit', 'error_one : ' . $e->getMessage());
        } catch (QueryException $e) {
            $this->exceptionerror(auth()->user(), 'admin_boards_createoredit', 'error_two : ' . $e->getMessage());
        } catch (PDOException $e) {
            $this->exceptionerror(auth()->user(), 'admin_boards_createoredit', 'error_three : ' . $e->getMessage());
        }
    }

    protected function databind($boardid, $type)
    {
        if ($type == 'edit') {
            $board = Board::find($boardid);
            $this->name = $board->name;
            $this->note = $board->note;
            $this->board_id = $boardid;
        } else {
            $this->showdata = Board::find($boardid);
        }
    }

    public function formreset()
    {
        $this->name = $this->note = $this->board_id = null;
        $this->resetValidation();
    }

    public function render()
    {
        $board = Board::query()
            ->where(function ($query) {
                $query->where('name', 'like', '%' . $this->searchTerm . '%');
            })
            ->orderBy($this->sortColumnName, $this->sortDirection)
            ->paginate($this->paginationlength)
            ->onEachSide(1);
        return view('livewire.admin.settings.user.role.rolelivewire',
            compact('board'));
    }
}
