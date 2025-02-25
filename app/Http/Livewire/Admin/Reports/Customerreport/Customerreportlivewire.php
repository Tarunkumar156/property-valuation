<?php

namespace App\Http\Livewire\Admin\Reports\Customerreport;

use App\Export\Admin\Reports\Customerreport\CustomerreportExport;
use App\Models\Customer\Auth\Customer;
use Carbon\Carbon;
use Livewire\Component;
use Livewire\WithPagination;
use Maatwebsite\Excel\Facades\Excel;
use PDF;

class Customerreportlivewire extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $from_date, $to_date;
    public $sortColumnName = 'created_at';
    public $sortDirection = 'desc';
    public $paginationlength = 10;
    public $searchTerm = null;

    public function mount()
    {
        $this->from_date = Carbon::now()->subDays(7)->format('Y-m-d');
        $this->to_date = Carbon::tomorrow()->format('Y-m-d');
    }

    public function updatepagination()
    {
        $this->resetPage();
    }

    public function updatingSearchTerm()
    {
        $this->resetPage();
    }

    public function sortBy($columnName)
    {
        if ($this->sortColumnName === $columnName) {
            $this->sortDirection = $this->swapSortDirection();
        } else {
            $this->sortDirection = 'asc';
        }
        $this->sortColumnName = $columnName;
    }

    public function swapSortDirection()
    {
        return $this->sortDirection === 'asc' ? 'desc' : 'asc';
    }

    public function clear()
    {
        $this->from_date = Carbon::now()->subDays(7)->format('Y-m-d');
        $this->to_date = Carbon::tomorrow()->format('Y-m-d');
        $this->searchTerm = null;
        $this->resetPage();
    }
    public function export()
    {
        $customer = $this->query()->get();
        return Excel::download(new CustomerreportExport($customer), 'customerreport.xls');
    }

    public function pdf()
    {
        $customer = $this->query()->get();
        $pdf = PDF::loadView('livewire.admin.reports.customerreport.customerreportpdf', compact('customer'))->output();
        return response()->streamDownload(fn() => print($pdf), "customerreport.pdf");
    }
    protected function query()
    {
        return Customer::whereBetween('created_at', [$this->from_date . " 00:00:00", $this->to_date . " 23:59:59"])
            ->where(fn($q) =>
                $q->where('name', 'like', '%' . $this->searchTerm . '%')
            )
            ->orderBy($this->sortColumnName, $this->sortDirection);
    }
    public function render()
    {
        $customerreport = $this->query()
            ->paginate($this->paginationlength)
            ->onEachSide(1);
        return view('livewire.admin.reports.customerreport.customerreportlivewire', compact('customerreport'));
    }
}
