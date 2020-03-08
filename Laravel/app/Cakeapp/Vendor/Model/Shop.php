<?php

namespace App\Cakeapp\Vendor\Model;

use App\Cakeapp\Location\Model\Locality;
use App\Cakeapp\Location\Model\Municipal;
use App\Cakeapp\User\Model\User;
use Illuminate\Database\Eloquent\Model;

class Shop extends Model
{
    protected $table = 'shops';

    protected $fillable = ['name','email','address','phone','no_of_flavour','owner_id','municipal_id','locality_id'];

    protected function owner(){
        return $this->hasOne(User::class,'user_id');
    }

    protected function municipal(){
        return $this->hasOne(Municipal::class,'municipal_id');
    }

    protected function locality(){
        return $this->hasOne(Locality::class,'locality_id');
    }
}
