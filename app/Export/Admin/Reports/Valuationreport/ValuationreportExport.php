<?php

namespace App\Export\Admin\Reports\Valuationreport;

use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class ValuationreportExport implements FromCollection, WithMapping, WithHeadings
{
    use Exportable;

    // a place to store the team dependency
    private $valuation;

    // use constructor to handle dependency injection
    public function __construct($valuation)
    {
        $this->valuation = $valuation;
    }

    // set the collection of members to export
    public function collection()
    {
        return $this->valuation;
    }

    // map what a single member row should look like
    // this method will iterate over each collection item
    public function map($valuation): array
    {
        return [
            $valuation->name,
            $valuation->customer->name,
            $valuation?->category->name,
            $valuation?->latitude,
            $valuation?->longitude,
            $valuation?->googlemaplocation,
            $valuation?->threewordlocation,

        ];
    }

    // this is fine
    public function headings(): array
    {
        return [['Valuation Report'], [], [
            'PROPERTY NAME',
            'CUSTOMER NAME',
            'CATEGORY',
            'LATITUDE',
            'LONGITUDE',
            'GEO MAP LOCATION',
            'THREE WORLD LOCATION',
        ],
        ];
    }
}
