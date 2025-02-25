<?php

namespace App\Models\Admin\Valuation;

use App\Models\Admin\Valuation\Valuation;
use Illuminate\Database\Eloquent\Model;

class Wizardfour extends Model
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

    // public static function boot()
    // {
    //     parent::boot();

    //     self::creating(function ($model) {
    //         dd($model);
    //         $model->extrapotentialvalue = is_empty($model->extrapotentialvalue) ? null : $model->extrapotentialvalue;

    //     });
    // }

    // public static function boot()
    // {
    //     parent::boot();
    //     self::creating(function ($model) {
    //         dd($model);
    //         $model->extrapotentialvalue = is_empty($model->extrapotentialvalue) ? null : $model->extrapotentialvalue;
    //     });

// }

    public function setMarketabilityAttribute($value = null)
    {
        $this->attributes['marketability'] = ($value == '') ? null : $value;
    }
    public function setExtrapotentialvalueAttribute($value = null)
    {
        $this->attributes['extrapotentialvalue'] = ($value == '') ? null : $value;
    }
    public function setNegativefactorsAttribute($value = null)
    {
        $this->attributes['negativefactors'] = ($value == '') ? null : $value;
    }
    public function setCompositerateAttribute($value = null)
    {
        $this->attributes['compositerate'] = ($value == '') ? null : $value;
    }
    public function setAdoptedcompositerateminAttribute($value = null)
    {
        $this->attributes['adoptedcompositeratemin'] = ($value == '') ? null : $value;
    }
    public function setAdoptedcompositeratemaxAttribute($value = null)
    {
        $this->attributes['adoptedcompositeratemax'] = ($value == '') ? null : $value;
    }
    public function setAdoptedbasiccompositerateAttribute($value = null)
    {
        $this->attributes['adoptedbasiccompositerate'] = ($value == '') ? null : $value;
    }
    public function setBuildingandservicesAttribute($value = null)
    {
        $this->attributes['buildingandservices'] = ($value == '') ? null : $value;
    }
    public function setLandandothersAttribute($value = null)
    {
        $this->attributes['landandothers'] = ($value == '') ? null : $value;
    }
    public function setRegistrarrateAttribute($value = null)
    {
        $this->attributes['registrarrate'] = ($value == '') ? null : $value;
    }
    public function setAgeofbuildingAttribute($value = null)
    {
        $this->attributes['ageofbuilding'] = ($value == '') ? null : $value;
    }
    public function setLifeofbuildingAttribute($value = null)
    {
        $this->attributes['lifeofbuilding'] = ($value == '') ? null : $value;
    }
    public function setSalvagevalueAttribute($value = null)
    {
        $this->attributes['salvagevalue'] = ($value == '') ? null : $value;
    }
    public function setReplacementcostAttribute($value = null)
    {
        $this->attributes['replacementcost'] = ($value == '') ? null : $value;
    }
    public function setEstimatedvalueAttribute($value = null)
    {
        $this->attributes['estimatedvalue'] = ($value == '') ? null : $value;
    }
    public function setDepreciatedbuildingrateAttribute($value = null)
    {
        $this->attributes['depreciatedbuildingrate'] = ($value == '') ? null : $value;
    }
    public function setRateforlandandothersAttribute($value = null)
    {
        $this->attributes['rateforlandandothers'] = ($value == '') ? null : $value;
    }
    public function setTotalcompositerateAttribute($value = null)
    {
        $this->attributes['totalcompositerate'] = ($value == '') ? null : $value;
    }
    public function setSayAttribute($value = null)
    {
        $this->attributes['say'] = ($value == '') ? null : $value;
    }
    public function setReplacementcostofflatAttribute($value = null)
    {
        $this->attributes['replacementcostofflat'] = ($value == '') ? null : $value;
    }
    public function setEstimatedvalueofusdAttribute($value = null)
    {
        $this->attributes['estimatedvalueofusd'] = ($value == '') ? null : $value;
    }
    public function setCurrentmarketrateAttribute($value = null)
    {
        $this->attributes['currentmarketrate'] = ($value == '') ? null : $value;
    }
    public function setServicelifebuildingAttribute($value = null)
    {
        $this->attributes['servicelifebuilding'] = ($value == '') ? null : $value;
    }
    public function setDepreciationaccountedAttribute($value = null)
    {
        $this->attributes['depreciationaccounted'] = ($value == '') ? null : $value;
    }
    public function setDepreciatedrateconstructionAttribute($value = null)
    {
        $this->attributes['depreciatedrateconstruction'] = ($value == '') ? null : $value;
    }
    public function setPwdrateAttribute($value = null)
    {
        $this->attributes['pwdrate'] = ($value == '') ? null : $value;
    }
    public function setPwdservicelifebuildingAttribute($value = null)
    {
        $this->attributes['pwdservicelifebuilding'] = ($value == '') ? null : $value;
    }
    public function setPwddepreciationaccountedAttribute($value = null)
    {
        $this->attributes['pwddepreciationaccounted'] = ($value == '') ? null : $value;
    }
    public function setPwddepreciatedrateconstructionAttribute($value = null)
    {
        $this->attributes['pwddepreciatedrateconstruction'] = ($value == '') ? null : $value;
    }
    public function setPwdreplacementcostofflatAttribute($value = null)
    {
        $this->attributes['pwdreplacementcostofflat'] = ($value == '') ? null : $value;
    }
    public function setPwdestimatedvalueofusdAttribute($value = null)
    {
        $this->attributes['pwdestimatedvalueofusd'] = ($value == '') ? null : $value;
    }
}
