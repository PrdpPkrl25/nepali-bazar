<?php

namespace App\Cakeapp\Purchase\Model;

use Illuminate\Database\Eloquent\Model;

class Purchase extends Model
{
    protected $fillable=[
        'purchase_date','order_id'
    ];

    protected function order()
    {
        return $this-> hasOne(Order::class,'order_id');
    }
}
