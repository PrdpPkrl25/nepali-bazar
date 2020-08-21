<?php

namespace App\Cakeapp\Vendor\Model;

use App\Cakeapp\Location\Model\District;
use App\Cakeapp\Location\Model\Locality;
use App\Cakeapp\Location\Model\Municipal;
use App\Cakeapp\Location\Model\Province;
use App\Cakeapp\Location\Model\Ward;
use App\Cakeapp\Product\Model\Product;
use App\Cakeapp\User\Model\User;
use Illuminate\Database\Eloquent\Model;

class Shop extends Model
{
    protected $table = 'shops';

    protected $fillable = ['shop_name','email','phone_number','image_name','owner_id','province_id','district_id','municipal_id','ward_id','locality'];

    public function owner(){
        return $this->belongsTo(User::class,'user_id');
    }

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

    public function locality(){
        return $this->belongsTo(Locality::class,'locality_id');
    }

    public function products(){
        return $this->hasMany(Product::class);
    }

}
