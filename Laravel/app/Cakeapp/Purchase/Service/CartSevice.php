<?php


namespace App\Cakeapp\Purchase\Service;


use App\Cakeapp\Product\Model\Product;
use App\Cakeapp\Purchase\Model\Cart;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Laracasts\Flash\Flash;

class CartSevice
{

    public function addProductInCart($product_id, $cart){
        $product=Product::where('id',$product_id)->first();
        $hasProduct=$cart->products()->where('id',$product_id)->exists();
        if(!$hasProduct){
            $cart->products()->attach($product_id,['quantity'=>$product->base_quantity,'price_per_base_quantity'=>$product->price,'measure_unit'=>$product->measure_unit,'price'=>$product->price,'net_price'=>$product->price]);
            Session::flash('success', 'Product successfully added in cart');
        }
        else{
            Session::flash('error', 'Product already in cart');
        }

    }

}
