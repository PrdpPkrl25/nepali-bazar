<?php

namespace App\Cakeapp\Product\Model;

use App\Cakeapp\Purchase\Model\Cart;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{


    protected $table='products';

    protected $fillable = [
       'category_id','shop_id', 'product_name', 'base_quantity','price','measure_unit','image_name',
    ];

    public function carts(){
        return $this->belongsToMany(Cart::class,'carts_products');
    }


}
