<?php

namespace App\Http\Controllers\Web\Purchase;

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
     * @param  \Illuminate\Http\Request  $request
     * @return \Laracasts\Flash\FlashNotifier
     */
    public function store(Request $request,$product_id)
    {

        $this -> cartRepository -> handleCreate($request,$product_id);

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
            $total_price=0;
            foreach($cart->products as $product){
                $total_price=$product->pivot->net_price + $total_price;
            }
         return view('purchase.cart.show_cart',compact('cart','total_price'));
       }

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function edit(Cart $cart)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $requestData = $request->all();
        $cart = $this-> cartRepository->showData($id);
        $cart->update($requestData);
        return response()->json($cart,200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this -> cartRepository -> handleDelete($id);

        return response()->json(null,204);
    }
}
