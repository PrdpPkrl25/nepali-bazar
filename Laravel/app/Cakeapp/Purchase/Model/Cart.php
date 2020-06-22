<?php

namespace App\Cakeapp\Purchase\Model;

use App\Cakeapp\Product\Model\Product;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    protected $table='carts';
    protected $fillable=[
      'user_id','total_price','product_id'
    ];

    public function products(){
        return $this->belongsToMany(Product::class,'carts_products')->withPivot('quantity','price_per_quantity','measure_unit','price','discount_price','net_price','voucher_id','product_added_time')->withTimestamps();
    }

}
