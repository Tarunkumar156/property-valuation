<?php

namespace App\Models\Admin\Valuation;

use App\Models\Admin\Valuation\Valuation;
use Illuminate\Database\Eloquent\Model;

class Wizardsix extends Model
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
}
