<?php

namespace App\Models\Admin\Valuation;

use App\Models\Admin\Settings\Mastersetting\Category;
use App\Models\Admin\Valuation\Wizardfive;
use App\Models\Admin\Valuation\Wizardfour;
use App\Models\Admin\Valuation\Wizardone;
use App\Models\Admin\Valuation\Wizardsix;
use App\Models\Admin\Valuation\Wizardthree;
use App\Models\Admin\Valuation\Wizardtwo;
use App\Models\Commontraits\CommonTraits\BootTraits;
use App\Models\Commontraits\CommonTraits\GeneralTraits;
use App\Models\Customer\Auth\Customer;
use Illuminate\Database\Eloquent\Model;

class Valuation extends Model
{
    use BootTraits, GeneralTraits;

    public static $prefix = [5, 'PV'];

    protected $dates = ['deleted_at'];
    protected $guarded = ['id'];

    protected $casts = [
        'created_at' => 'datetime:d-M-Y h:i:s',
        'updated_at' => 'datetime:d-M-Y h:i:s',
    ];
    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function wizardone()
    {
        return $this->hasOne(Wizardone::class);
    }

    public function wizardtwo()
    {
        return $this->hasOne(Wizardtwo::class);
    }

    public function wizardthree()
    {
        return $this->hasOne(Wizardthree::class);
    }

    public function wizardfour()
    {
        return $this->hasOne(Wizardfour::class);
    }

    public function wizardfive()
    {
        return $this->hasOne(Wizardfive::class);
    }

    public function wizardsix()
    {
        return $this->hasOne(Wizardsix::class);
    }
}
