<?php

namespace App\Models\Admin\Valuation\Valuationprocess\Wizard3;

use Illuminate\Database\Eloquent\Model;

class Dwellingarealist extends Model
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

    public function setAsperplanAttribute($value = null)
    {
        $this->attributes['asperplan'] = ($value == '') ? null : $value;
    }
    public function setAspersiteAttribute($value = null)
    {
        $this->attributes['aspersite'] = ($value == '') ? null : $value;
    }
}
