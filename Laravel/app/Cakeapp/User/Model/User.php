<?php

namespace App\Cakeapp\User\Model;

use App\Cakeapp\Location\Model\District;
use App\Cakeapp\Location\Model\Municipal;
use App\Cakeapp\Location\Model\Province;
use App\Cakeapp\Location\Model\Ward;
use App\Cakeapp\Vendor\Model\Shop;
use App\Mail\UserVerified;
use App\Cakeapp\User\Permission\HasPermissionsTrait;
use App\Scopes\ActiveScope;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Mail;


class User extends Authenticatable
{
    use HasPermissionsTrait;
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name','phone_number', 'email', 'password','province_id','district_id','municipal_id','ward_id','locality','provider', 'provider_id'];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    protected static function booted(){
        static::created(function ($user)
        {
           // Mail::to($user)->send(new UserVerified($user));
        });
    }
    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function province(){
        return $this->belongsTo(Province::class,'province_id');
    }

    public function district(){
        return $this->belongsTo(District::class,'district_id');
    }

    public function municipal(){
        return $this->belongsTo(Municipal::class,'municipal_id');
    }

    public function ward(){
        return $this->belongsTo(Ward::class,'ward_id');
    }

    public function shops(){
        return $this->hasMany(Shop::class,'owner_id');
    }






}
