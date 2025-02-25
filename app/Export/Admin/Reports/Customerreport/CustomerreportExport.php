<?php

namespace App\Export\Admin\Reports\Customerreport;

use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class CustomerreportExport implements FromCollection, WithMapping, WithHeadings
{
    use Exportable;

    // a place to store the team dependency
    private $customer;

    // use constructor to handle dependency injection
    public function __construct($customer)
    {
        $this->customer = $customer;
    }

    // set the collection of members to export
    public function collection()
    {
        return $this->customer;
    }

    // map what a single member row should look like
    // this method will iterate over each collection item
    public function map($customer): array
    {
        return [
            $customer->name,
            $customer->type ? config('archive.customer_type')[$customer->type] : '',
            $customer?->email,
            $customer?->phone,
            $customer?->address,
            $customer?->contact_person_name,
            $customer?->contact_person_phone,

        ];
    }

    // this is fine
    public function headings(): array
    {
        return [['Customer Report'], [], [
            'NAME',
            'TYPE',
            'EMAIL',
            'PHONE',
            'ADDRESS',
            'CONTACT PERSON NAME',
            'CONTACT PERSON PHONE',
        ],
        ];
    }
}
