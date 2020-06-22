<?php

namespace App\Cakeapp\Vendor\Model;

use App\Cakeapp\Location\Model\Locality;
use App\Cakeapp\Location\Model\Municipal;
use App\Cakeapp\Location\Model\Ward;
use App\Cakeapp\User\Model\User;
use Illuminate\Database\Eloquent\Model;

class Shop extends Model
{
    protected $table = 'shops';

    protected $fillable = ['shop_name','email','phone_number','image_name','owner_id','province_id','district_id','municipal_id','ward_id','locality'];

    protected function owner(){
        return $this->belongsTo(User::class,'user_id');
    }

    protected function municipal(){
        return $this->belongsTo(Municipal::class,'municipal_id');
    }

    protected function ward(){
        return $this->belongsTo(Ward::class,'ward_id');
    }

    protected function locality(){
        return $this->belongsTo(Locality::class,'locality_id');
    }
}
