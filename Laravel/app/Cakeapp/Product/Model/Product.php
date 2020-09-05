<?php

namespace App\Cakeapp\Product\Model;

use App\Cakeapp\Common\Service\CheckOwnerTrait;
use App\Cakeapp\Purchase\Model\Cart;
use App\Cakeapp\User\Permission\CheckPermissionTrait;
use App\Cakeapp\Vendor\Model\Owner;
use App\Cakeapp\Vendor\Model\Shop;
use App\Scopes\ActiveScope;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Product extends Model
{

    use CheckOwnerTrait;
    protected $table='products';

    protected $fillable = [
       'category_id','shop_id', 'product_name', 'base_quantity','price','measure_unit','image_name','active_status'
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

    public function features(){
        return $this->hasMany(Feature::class,'product_id');
    }

    public function scopeRefactorProduct( $query,$user=null){
       $productIdsArray=$this->ownerProduct($user);
       return $query->whereIn('id',$productIdsArray);
    }

    protected static function boot()
    {
        parent::boot();

        static::addGlobalScope(new ActiveScope());
    }

}
