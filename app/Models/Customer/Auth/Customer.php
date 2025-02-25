<?php

namespace App\Models\Customer\Auth;

use App\Models\Commontraits\AuthTraits\HasAuthTrait;
use App\Models\Miscellaneous\Helper;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Str;
use Laravel\Passport\HasApiTokens;

class Customer extends Authenticatable
{
    use HasApiTokens, Notifiable, SoftDeletes;

    use HasAuthTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = ['name', 'email', 'phone', 'type',
        'contact_person_phone', 'address', 'contact_person_name', 'avatar', 'note'];

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
            Helper::autogenerateidotherpanel(8, 'C', $model);
        });

    }

    public function routeNotificationForSlack($notification)
    {
        return 'https://hooks.slack.com/services/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';
    }

}
