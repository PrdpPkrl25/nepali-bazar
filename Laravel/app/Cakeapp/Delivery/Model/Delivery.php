<?php

namespace App\Cakeapp\Delivery\Model;

use Illuminate\Database\Eloquent\Model;

class Delivery extends Model
{
    protected $fillable=[
        'delivery_date','delivery_status',
    ];
}
