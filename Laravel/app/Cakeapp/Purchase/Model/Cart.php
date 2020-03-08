<?php

namespace App\Cakeapp\Purchase\Model;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    protected $fillable=[
      'cart_date','total_price',
    ];
}
