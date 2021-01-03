<?php


namespace App\Cakeapp\Purchase\Service;


use App\Cakeapp\Product\Model\Product;
use App\Cakeapp\Purchase\Model\Cart;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Laracasts\Flash\Flash;

class CartSevice
{

    public static function addProductInCart($productId, $cart){
        $product=Product::where('id',$productId)->first();
        $hasProduct=$cart->products()->where('id',$productId)->exists();
        if(!$hasProduct){
            $cart->products()->attach($productId,['quantity'=>$product->base_quantity,'price_per_base_quantity'=>$product->price,'measure_unit'=>$product->measure_unit,'price'=>$product->price,'net_price'=>$product->price]);
            Session::flash('success', 'Product successfully added in cart');
        }
        else{
            Session::flash('error', 'Product already in cart');
        }

    }

    public static function findTheCart($shopId){
        $cart=Cart::where('shop_id',$shopId)->where('cart_session_id',\session()->get('cart_session_id'))->first();
        return $cart;
    }

    public static function addNewShopInCart($shopId)
    {
        $cart_array =['user_id'=>Auth::id(),'shop_id'=>$shopId];
        $cart=Cart::create($cart_array);
        return $cart;
    }


}
