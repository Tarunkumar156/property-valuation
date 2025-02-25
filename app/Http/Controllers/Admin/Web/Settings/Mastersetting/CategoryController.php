<?php

namespace App\Http\Controllers\Admin\Web\Settings\Mastersetting;

use App\Http\Controllers\Controller;

class CategoryController extends Controller
{
    public function category()
    {
        return view('admin.settings.mastersetting.category.category');
    }
}
