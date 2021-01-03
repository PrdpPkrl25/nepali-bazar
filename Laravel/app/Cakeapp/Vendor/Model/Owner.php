<?php

namespace App\Cakeapp\Vendor\Model;

use App\Cakeapp\User\Model\User;
use Illuminate\Database\Eloquent\Model;

class Owner extends Model
{
    protected $fillable=[
        'shop_id','user_id'
    ];

    protected function shop(){
        return $this->belongsTo(Shop::class.'shop_id');
    }

    protected function user(){
        return $this->belongsTo(User::class,'user_id');
    }

}
