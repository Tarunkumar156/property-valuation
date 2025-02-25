<?php

namespace App\Http\Controllers\Admin\Web\Valuation;

use App\Http\Controllers\Controller;

class ValuationController extends Controller
{
    public function valuation()
    {
        return view('admin.valuation.valuation.index');
    }

    public function valuationprocess($id)
    {
        return view('admin.valuation.valuationprocess.index', compact('id'));
    }
}
