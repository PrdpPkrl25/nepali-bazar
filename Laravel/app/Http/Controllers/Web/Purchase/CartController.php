<?php

namespace App\Http\Controllers\Web\Purchase;

use App\Cakeapp\Product\Model\Product;
use App\Cakeapp\Purchase\Model\Cart;
use App\Cakeapp\Purchase\Model\CartRepository;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\View;

class CartController extends Controller
{
    private $cartRepository;

    public function __construct(CartRepository $cartRepository)
    {
        $this -> cartRepository = $cartRepository;
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @param $product_id
     * @return \Illuminate\Contracts\View\View
     */
    public function store($product_id)
    {

        $this -> cartRepository -> handleCreate($product_id);

        return View::make('partials/flash-messages');
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Cart  $cart
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show()
    {
        if (session()->has('cart')){
            $cart = session()->get('cart');
            $total_price=0.00;
            foreach($cart->products as $product){
                $total_price=$product->pivot->net_price + $total_price;
            }
         return view('purchase.cart.show_cart',compact('cart','total_price'));
       }
        else{
            return view('purchase.cart.empty_cart');
        }

    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param Cart $cart
     * @return void
     */
    public function edit(Cart $cart)
    {
        //
    }


    /**
     * Update the specified resource in storage.
     *
     * @param $cart_id
     * @param $product_id
     * @return false|string
     */
    public function update($cart_id, $product_id)
    {
        $quantity=request()->input('quantity');
        $cart=Cart::where('id',$cart_id)->first();
        $product=Product::where('id',$product_id)->first();
        $base_price=$product->price;
        $base_quantity=$product->base_quantity;
        $price=($quantity/$base_quantity) * $base_price;
        $net_price=round($price,2);
        $cart->products()->updateExistingPivot($product_id,['quantity'=>$quantity,'price'=>$price,'net_price'=>$net_price]);
        session()->forget('cart');
        session()->put('cart',$cart);
        $total_price=0.00;
        foreach($cart->products as $product){
            $total_price=$product->pivot->net_price + $total_price;
        }
        return json_encode(array('net_price'=>$net_price, 'total_price'=>$total_price));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param $id
     * @return void
     */
    public function delete($cart_id, $product_id)
    {
        $cart=Cart::where('id',$cart_id)->first();
        $cart->products()->detach($product_id);
        session()->forget('cart');
        session()->put('cart',$cart);
        return 'success';

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param $id
     * @return void
     */
    public function destroy($id)
    {
        $this -> cartRepository -> handleDelete($id);

    }
}
