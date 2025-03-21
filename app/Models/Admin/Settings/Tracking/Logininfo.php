<?php

namespace App\Models\Admin\Settings\Tracking;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Logininfo extends Model
{
    use SoftDeletes;

    protected $dates = ['deleted_at'];
    protected $guarded = ['id'];

    public static function boot()
    {
        parent::boot();
        self::creating(function ($model) {
            $model->uuid = str()->uuid();
        });
    }

    public function logininfoable()
    {
        return $this->morphTo();
    }
}
