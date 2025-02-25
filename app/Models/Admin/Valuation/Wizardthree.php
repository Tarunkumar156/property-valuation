<?php

namespace App\Models\Admin\Valuation;

use App\Models\Admin\Valuation\Valuation;
use App\Models\Admin\Valuation\Valuationprocess\Wizard3\Dwellingarealist;
use App\Models\Admin\Valuation\Valuationprocess\Wizard3\Plintharealist;
use App\Models\Admin\Valuation\Valuationprocess\Wizard3\Salesdeeednamelist;
use Illuminate\Database\Eloquent\Model;

class Wizardthree extends Model
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
    public function salesdeeednamelist()
    {
        return $this->hasMany(Salesdeeednamelist::class);
    }
    public function plintharealist()
    {
        return $this->hasMany(Plintharealist::class);
    }

    public function dwellingarealist()
    {
        return $this->hasMany(Dwellingarealist::class);
    }

    public function setBuiltupareaAttribute($value = null)
    {
        $this->attributes['builtuparea'] = ($value == '') ? null : $value;
    }
    public function setPlinthareaofflatAttribute($value = null)
    {
        $this->attributes['plinthareaofflat'] = ($value == '') ? null : $value;
    }
    public function setFloorspaceindexAttribute($value = null)
    {
        $this->attributes['floorspaceindex'] = ($value == '') ? null : $value;
    }
    public function setCarpetareaofflatAttribute($value = null)
    {
        $this->attributes['carpetareaofflat'] = ($value == '') ? null : $value;
    }
    public function setAreaoflocalityAttribute($value = null)
    {
        $this->attributes['areaoflocality'] = ($value == '') ? null : $value;
    }
    public function setUsagepurposeAttribute($value = null)
    {
        $this->attributes['usagepurpose'] = ($value == '') ? null : $value;
    }
    public function setOwneroccupiedorletoutAttribute($value = null)
    {
        $this->attributes['owneroccupiedorletout'] = ($value == '') ? null : $value;
    }
    public function setMonthlyrentAttribute($value = null)
    {
        $this->attributes['monthlyrent'] = ($value == '') ? null : $value;
    }
    public function setSetbacksasperplannorthAttribute($value = null)
    {
        $this->attributes['setbacksasperplannorth'] = ($value == '') ? null : $value;
    }
    public function setSetbacksasperplansouthAttribute($value = null)
    {
        $this->attributes['setbacksasperplansouth'] = ($value == '') ? null : $value;
    }
    public function setSetbacksasperplaneastAttribute($value = null)
    {
        $this->attributes['setbacksasperplaneast'] = ($value == '') ? null : $value;
    }
    public function setSetbacksasperplanwestAttribute($value = null)
    {
        $this->attributes['setbacksasperplanwest'] = ($value == '') ? null : $value;
    }
    public function setSetbacksaspersitenorthAttribute($value = null)
    {
        $this->attributes['setbacksaspersitenorth'] = ($value == '') ? null : $value;
    }
    public function setSetbacksaspersitesouthAttribute($value = null)
    {
        $this->attributes['setbacksaspersitesouth'] = ($value == '') ? null : $value;
    }
    public function setSetbacksaspersiteeastAttribute($value = null)
    {
        $this->attributes['setbacksaspersiteeast'] = ($value == '') ? null : $value;
    }
    public function setSetbacksaspersitewestAttribute($value = null)
    {
        $this->attributes['setbacksaspersitewest'] = ($value == '') ? null : $value;
    }
}
