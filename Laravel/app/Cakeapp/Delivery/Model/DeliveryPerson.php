<?php

namespace App\Cakeapp\Delivery\Model;

use App\Cakeapp\User\Model\User;
use Illuminate\Database\Eloquent\Model;

class DeliveryPerson extends Model
{
protected $fillable=[
    'user_id','join_date'
];

protected function user(){
    return $this->belongsTo(User::class,'user_id');
}
}
