<?php

namespace App\Cakeapp\Purchase\Model;



use App\Cakeapp\Common\Eloquent\Repository;
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

    public function  handleCreate($request,$product_id)
    {
          $createservice=new CartSevice();
        if (Session::has('cart')){
            $cart = Session::get('cart');
        }
        else{
            $cart_array =['user_id'=>Auth::id()];
            $cart=$this->create($cart_array);

        }
        $createservice->addProductInCart($product_id, $cart);
        $cart=Cart::with('products')->find($cart->id);
        session(['cart' => $cart]);
    }

    public function showData($id)
    {
        $cart = $this -> findOrFail($id);
        return $cart;
    }

    public function handleDelete($id)
    {
        $cart = $this -> findOrFail($id);
        $cart -> delete();
    }

}
