<?php

namespace App\Cakeapp\Vendor\Model;

use App\Cakeapp\Location\Model\Locality;
use App\Cakeapp\Location\Model\Municipal;
use App\Cakeapp\User\Model\User;
use Illuminate\Database\Eloquent\Model;

class Shop extends Model
{
    protected $table = 'shops';

    protected $fillable = ['name','email','address','phone','number_of_flavour','owner_id','ward_id','locality_id'];

    protected function owner(){
        return $this->belongsTo(User::class,'user_id');
    }

    protected function municipal(){
        return $this->belongsTo(Municipal::class,'municipal_id');
    }

    protected function locality(){
        return $this->belongsTo(Locality::class,'locality_id');
    }
}
