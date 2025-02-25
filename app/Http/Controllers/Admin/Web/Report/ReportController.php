<?php

namespace App\Http\Controllers\Admin\Web\Report;

use App\Http\Controllers\Controller;
use App\Models\Admin\Valuation\Valuation;

class ReportController extends Controller
{
    public function customerreport()
    {
        return view('admin.report.customerreport');
    }

    public function valuationreport()
    {
        return view('admin.report.valuationreport');
    }

    public function valuationreportpdfstream(Valuation $valuation, $show)
    {
        return view('admin.report.valuationreportpdf', compact('valuation', 'show'));
    }

}
