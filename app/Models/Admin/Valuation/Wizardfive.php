<?php

namespace App\Models\Admin\Valuation;

use App\Models\Admin\Valuation\Valuation;
use Illuminate\Database\Eloquent\Model;

class Wizardfive extends Model
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
    public function setBuildingplusserviceqtyAttribute($value = null)
    {
        $this->attributes['buildingplusserviceqty'] = ($value == '') ? null : $value;
    }
    public function setBuildingplusservicerateAttribute($value = null)
    {
        $this->attributes['buildingplusservicerate'] = ($value == '') ? null : $value;
    }
    public function setCoveredcarparkqtyAttribute($value = null)
    {
        $this->attributes['coveredcarparkqty'] = ($value == '') ? null : $value;
    }
    public function setCoveredcarparkrateAttribute($value = null)
    {
        $this->attributes['coveredcarparkrate'] = ($value == '') ? null : $value;
    }
    public function setCoveredcarparkguideAttribute($value = null)
    {
        $this->attributes['coveredcarparkguide'] = ($value == '') ? null : $value;
    }
    public function setLiftqtyAttribute($value = null)
    {
        $this->attributes['liftqty'] = ($value == '') ? null : $value;
    }
    public function setLiftrateAttribute($value = null)
    {
        $this->attributes['liftrate'] = ($value == '') ? null : $value;
    }
    public function setLiftguideAttribute($value = null)
    {
        $this->attributes['liftguide'] = ($value == '') ? null : $value;
    }
    public function setModularkitchenqtyAttribute($value = null)
    {
        $this->attributes['modularkitchenqty'] = ($value == '') ? null : $value;
    }
    public function setModularkitchenrateAttribute($value = null)
    {
        $this->attributes['modularkitchenrate'] = ($value == '') ? null : $value;
    }
    public function setModularkitchenguideAttribute($value = null)
    {
        $this->attributes['modularkitchenguide'] = ($value == '') ? null : $value;
    }
    public function setSuperfinefinishqtyAttribute($value = null)
    {
        $this->attributes['superfinefinishqty'] = ($value == '') ? null : $value;
    }
    public function setSuperfinefinishrateAttribute($value = null)
    {
        $this->attributes['superfinefinishrate'] = ($value == '') ? null : $value;
    }
    public function setSuperfinefinishguideAttribute($value = null)
    {
        $this->attributes['superfinefinishguide'] = ($value == '') ? null : $value;
    }
    public function setInteriordecorationqtyAttribute($value = null)
    {
        $this->attributes['interiordecorationqty'] = ($value == '') ? null : $value;
    }
    public function setInteriordecorationrateAttribute($value = null)
    {
        $this->attributes['interiordecorationrate'] = ($value == '') ? null : $value;
    }
    public function setInteriordecorationguideAttribute($value = null)
    {
        $this->attributes['interiordecorationguide'] = ($value == '') ? null : $value;
    }
    public function setElectricaldepositfittingqtyAttribute($value = null)
    {
        $this->attributes['electricaldepositfittingqty'] = ($value == '') ? null : $value;
    }
    public function setElectricaldepositfittingrateAttribute($value = null)
    {
        $this->attributes['electricaldepositfittingrate'] = ($value == '') ? null : $value;
    }
    public function setElectricaldepositfittingguideAttribute($value = null)
    {
        $this->attributes['electricaldepositfittingguide'] = ($value == '') ? null : $value;
    }
    public function setExtracollapsiblegateqtyAttribute($value = null)
    {
        $this->attributes['extracollapsiblegateqty'] = ($value == '') ? null : $value;
    }
    public function setExtracollapsiblegaterateAttribute($value = null)
    {
        $this->attributes['extracollapsiblegaterate'] = ($value == '') ? null : $value;
    }
    public function setExtracollapsiblegateguideAttribute($value = null)
    {
        $this->attributes['extracollapsiblegateguide'] = ($value == '') ? null : $value;
    }
    public function setPotentialvalueqtyAttribute($value = null)
    {
        $this->attributes['potentialvalueqty'] = ($value == '') ? null : $value;
    }
    public function setPotentialvaluerateAttribute($value = null)
    {
        $this->attributes['potentialvaluerate'] = ($value == '') ? null : $value;
    }
    public function setPotentialvalueguideAttribute($value = null)
    {
        $this->attributes['potentialvalueguide'] = ($value == '') ? null : $value;
    }
    public function setEstimatebuildingplusservicerateAttribute($value = null)
    {
        $this->attributes['estimatebuildingplusservicerate'] = ($value == '') ? null : $value;
    }
    public function setEstimatecoveredcarparkrateAttribute($value = null)
    {
        $this->attributes['estimatecoveredcarparkrate'] = ($value == '') ? null : $value;
    }
    public function setEstimateliftrateAttribute($value = null)
    {
        $this->attributes['estimateliftrate'] = ($value == '') ? null : $value;
    }
    public function setEstimatemodularkitchenrateAttribute($value = null)
    {
        $this->attributes['estimatemodularkitchenrate'] = ($value == '') ? null : $value;
    }
    public function setEstimatesuperfinefinishrateAttribute($value = null)
    {
        $this->attributes['estimatesuperfinefinishrate'] = ($value == '') ? null : $value;
    }
    public function setEstimateinteriordecorationrateAttribute($value = null)
    {
        $this->attributes['estimateinteriordecorationrate'] = ($value == '') ? null : $value;
    }
    public function setEstimateelectricaldepositfittingrateAttribute($value = null)
    {
        $this->attributes['estimateelectricaldepositfittingrate'] = ($value == '') ? null : $value;
    }
    public function setEstimateextracollapsiblegaterateAttribute($value = null)
    {
        $this->attributes['estimateextracollapsiblegaterate'] = ($value == '') ? null : $value;
    }
    public function setEstimatepotentialvaluerateAttribute($value = null)
    {
        $this->attributes['estimatepotentialvaluerate'] = ($value == '') ? null : $value;
    }
    public function setEstimatepresenttotalvalueAttribute($value = null)
    {
        $this->attributes['estimatepresenttotalvalue'] = ($value == '') ? null : $value;
    }
    public function setGuidelinepresenttotalvalueAttribute($value = null)
    {
        $this->attributes['guidelinepresenttotalvalue'] = ($value == '') ? null : $value;
    }
}
