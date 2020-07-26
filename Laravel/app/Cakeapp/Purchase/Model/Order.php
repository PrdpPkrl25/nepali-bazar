<?php

namespace App\Cakeapp\Purchase\Model;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table='orders';

    protected $fillable=[
       'cart_id','name','phone_number','district','municipal','ward_number','locality','order_date','payment_method','delivery_charge','total_amount',
    ];

    public function cart(){
        return $this->belongsTo(Cart::class,'cart_id');
    }

}
