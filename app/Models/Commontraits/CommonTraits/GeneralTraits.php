<?php

namespace App\Models\Commontraits\CommonTraits;

use App\Models\Admin\Auth\User;
use App\Models\Admin\Settings\Tracking\Tracking;

trait GeneralTraits
{
    public function createdby()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function updatedby()
    {
        return $this->belongsTo(User::class, 'updated_id');
    }

    public function functionable()
    {
        return $this->morphMany(Tracking::class, 'functionable');
    }
}
