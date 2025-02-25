<?php

namespace App\Models\Admin\Valuation\Valuationprocess\Wizard3;

use App\Models\Admin\Valuation\Valuation;
use App\Models\Admin\Valuation\Wizardthree;
use Illuminate\Database\Eloquent\Model;

class Salesdeeednamelist extends Model
{
    protected $dates = ['deleted_at'];
    protected $guarded = ['id'];

    protected $casts = [
        'created_at' => 'datetime:d-M-Y h:i:s',
        'updated_at' => 'datetime:d-M-Y h:i:s',
    ];
    public function valuation()
    {
        return $this->belongsTo(Valuation::class);
    }
    public function wizardthree()
    {
        return $this->belongsTo(Wizardthree::class);
    }
}
