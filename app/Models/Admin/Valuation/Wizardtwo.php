<?php

namespace App\Models\Admin\Valuation;

use App\Models\Admin\Valuation\Valuation;
use Illuminate\Database\Eloquent\Model;

class Wizardtwo extends Model
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
    public function setDescriptionoflocalityAttribute($value = null)
    {
        $this->attributes['descriptionoflocality'] = ($value == '') ? null : $value;
    }
    public function setYearofconstructionAttribute($value = null)
    {
        $this->attributes['yearofconstruction'] = ($value == '') ? null : $value;
    }
    public function setQualityofconstructionAttribute($value = null)
    {
        $this->attributes['qualityofconstruction'] = ($value == '') ? null : $value;
    }
    public function setAppearanceofconstructionAttribute($value = null)
    {
        $this->attributes['appearanceofconstruction'] = ($value == '') ? null : $value;
    }
    public function setMaintenanceofbuildingAttribute($value = null)
    {
        $this->attributes['maintenanceofbuilding'] = ($value == '') ? null : $value;
    }
}
