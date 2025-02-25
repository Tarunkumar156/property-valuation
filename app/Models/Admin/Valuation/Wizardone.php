<?php

namespace App\Models\Admin\Valuation;

use App\Models\Admin\Settings\Mastersetting\Engineer;
use App\Models\Admin\Valuation\Valuation;
use App\Models\Admin\Valuation\Valuationprocess\Wizard1\Ownerlist;
use App\Models\Admin\Valuation\Valuationprocess\Wizard1\Propertyownerlist;
use Illuminate\Database\Eloquent\Model;

class Wizardone extends Model
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
    public function ownerlist()
    {
        return $this->hasMany(Ownerlist::class);
    }
    public function propertyownerlist()
    {
        return $this->hasMany(Propertyownerlist::class);
    }
    public function engineer()
    {
        return $this->belongsTo(Engineer::class);
    }
    public function setEngineer_idAttribute($value = null)
    {
        $this->attributes['engineer_id'] = ($value == '') ? null : $value;
    }
    public function setPropertydesccriptionAttribute($value = null)
    {
        $this->attributes['propertydesccription'] = ($value == '') ? null : $value;
    }
    public function setClassificationofareaAttribute($value = null)
    {
        $this->attributes['classificationofarea'] = ($value == '') ? null : $value;
    }
    public function setClassificationofarea1Attribute($value = null)
    {
        $this->attributes['classificationofarea1'] = ($value == '') ? null : $value;
    }
    public function setPropertycomesunderAttribute($value = null)
    {
        $this->attributes['propertycomesunder'] = ($value == '') ? null : $value;
    }
    public function setExtentofsiteAttribute($value = null)
    {
        $this->attributes['extentofsite'] = ($value == '') ? null : $value;
    }
    public function setOccupiedbyAttribute($value = null)
    {
        $this->attributes['occupiedby'] = ($value == '') ? null : $value;
    }
}
