<?php

namespace App\Models\Professional\Auth;

use App\Models\Admin\Auth\User;
use App\Models\Commontraits\AuthTraits\HasAuthTrait;
use App\Models\Miscellaneous\Helper;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Str;
use Laravel\Passport\HasApiTokens;

class Professional extends Model
{
    use HasApiTokens, Notifiable, SoftDeletes;

    use HasAuthTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = ['name', 'email', 'password', 'phone', 'avatar', 'note'];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public static function boot()
    {
        parent::boot();

        self::creating(function ($model) {
            $model->uuid = (string) Str::uuid();
            $model->api_token = Str::random(40);
            $model->usertype = 'CUSTOMER';
            Helper::autogenerateid(8, 'C', $model);
        });

        self::updating(function ($model) {
            $model->updated_id = auth()->user()->id;
        });

    }
}
