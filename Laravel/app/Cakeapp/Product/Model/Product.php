<?php

namespace App\Cakeapp\Product\Model;

use App\Cakeapp\Purchase\Model\Cart;
use App\Cakeapp\Vendor\Model\Shop;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{


    protected $table='products';

    protected $fillable = [
       'category_id','shop_id', 'product_name', 'base_quantity','price','measure_unit','image_name',
    ];

    public function carts(){
        return $this->belongsToMany(Cart::class,'carts_products')->using(CartProduct::class)->withPivot('quantity','price_per_base_quantity','measure_unit','price','discount_price','net_price','voucher_id','product_added_time')->withTimestamps();
    }

    public function shop(){
        return $this->belongsTo(Shop::class,'shop_id');
    }

    public function category(){
        return $this->belongsTo(Category::class,'category_id');
    }

}
