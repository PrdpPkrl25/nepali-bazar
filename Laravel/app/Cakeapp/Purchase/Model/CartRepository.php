<?php

namespace App\Cakeapp\Purchase\Model;


use App\Cakeapp\Common\Eloquent\Repository;
use App\Cakeapp\Product\Model\Product;
use App\Cakeapp\Purchase\Service\CartSevice;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class CartRepository extends Repository
{

    /**
     * Specify Model class name
     * @return mixed
     */
    public function model()
    {
        return Cart::class;
    }

    public function handleCreate($product_id)
    {
        $product = Product::with('shop')->where('id', $product_id)->first();
        if (Session::has('cart')) {
            $cart = Session::get('cart');
            $shopIdsArray = Cart::where('cart_session_id', Session::get('cart_session_id'))->pluck('shop_id')->toArray();
            if (in_array($product->shop_id, $shopIdsArray)) {
                $cart = CartSevice::findTheCart($product->shop_id);
            } else {
                if (count($shopIdsArray) == 3) {
                    Session::flash('error','Sorry, You cannot add product of more than 3 shops.');
                    return ;
                } else {
                    $cart = CartSevice::addNewShopInCart($product->shop_id);
                    $cart->cart_session_id=\session()->get('cart_session_id');
                    $cart->save();

                }
            }

        } else {
            $cart_array = ['user_id' => Auth::id(), 'shop_id' => $product->shop_id];
            $cart = $this->create($cart_array);
            $cart->cart_session_id = $cart->id;
            $cart->save();
            session(['cart_session_id' => $cart->id]);

        }
        $createservice = new CartSevice();
        $createservice->addProductInCart($product_id, $cart);
        $carts = Cart::with('shop','products')->where('cart_session_id',Session::get('cart_session_id'))->get();
        session(['cart' => $carts]);
    }

    public function showData($id)
    {
        $cart = $this->findOrFail($id);
        return $cart;
    }

    public function handleDelete($cartId,$productId)
    {
        $cart=Cart::where('id',$cartId)->first();
        $cart->products()->detach($productId);
        session()->forget('cart');
        $carts= Cart::with('shop','products')->where('cart_session_id',Session::get('cart_session_id'))->get();
        session()->put('cart',$carts);
        return 'success';
    }

    public function handleDestroy($id)
    {
        $cart = $this->findOrFail($id);
        $cart->delete();
    }

}
