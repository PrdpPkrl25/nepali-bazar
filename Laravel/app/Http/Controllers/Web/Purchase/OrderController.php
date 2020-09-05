<?php

namespace App\Http\Controllers\Web\Purchase;

use App\Cakeapp\Location\Model\District;
use App\Cakeapp\Location\Model\Municipal;
use App\Cakeapp\Location\Model\Ward;
use App\Cakeapp\Product\Model\Product;
use App\Cakeapp\Purchase\Model\Cart;
use App\Cakeapp\Purchase\Model\Order;
use App\Cakeapp\Purchase\Model\OrderRepository;
use App\Cakeapp\User\Model\User;
use App\Cakeapp\Vendor\Model\Shop;
use App\Http\Controllers\Controller;
use App\Jobs\OrderReceivedJob;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    private $orderRepository;

    public function __construct(OrderRepository $orderRepository)
    {
        $this-> orderRepository = $orderRepository;
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        if(Auth::user()->hasRole('owner')){
            $shopIdsArray=Shop::where('owner_id',Auth::id())->pluck('id');
            $cartsIdArray=Cart::whereIn('shop_id',$shopIdsArray)->pluck('id');
            $orders=Order::with('cart')->whereIn('cart_id',$cartsIdArray)->get();
            return view('purchase.order.order_received',compact('orders'));
        }


        else if(Auth::user()->hasRole('customer')){
            $cartIdArray=Cart::where('user_id',Auth::id())->get()->pluck('id');
            $orders=Order::whereIn('cart_id',$cartIdArray)->get();
            return view('purchase.order.orders',compact('orders'));
        }


    }

    /**
     * Show the form for creating a new resource.
     *
     * @param $cart_id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {

        $user=User::with(['district','municipal','ward'])->findOrFail(Auth::id());
        if (session()->has('cart')) {
            $carts = session()->get('cart');
            $item_count=0;
            $delivery_charge=0;
            foreach ($carts as $cart){
                $total_price=0.00;
                $item_count=$item_count+$cart->products->count();
                $delivery_charge=$delivery_charge+$cart->shop->delivery_charge;
                foreach ($cart->products as $product) {
                    $total_price = $product->pivot->net_price + $total_price;
                }
                if($cart->shop->minimum_order_price > $total_price){
                    flash("Minimum Order Price for " . $cart->shop->shop_name . "shop is " . $cart->shop->minimum_order_price .". Please add some product in the cart.")->error();
                   return redirect()->back();
                }
            }
            $total_price = 0.00;
            foreach ($carts as $cart){
                foreach ($cart->products as $product) {
                    $total_price = $product->pivot->net_price + $total_price;

                }
            }

            return view('purchase.order.create_order', compact('user','total_price','item_count','delivery_charge'));
        }
        else{
            flash('Your session time is over. Create your cart again.')->message();
            return redirect()->back();
        }


    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function store(Request $request)
    {
        if (session()->has('cart')) {

        $orders = $this -> orderRepository -> handleCreate($request);
        $cart_session_id=session()->get('cart_session_id');
        session()->forget(['cart','cart_session_id']);
        $total_amount=0.00;
        foreach ($orders as $order){
            $total_amount=$order->total_amount+$total_amount;
            $name=$order->name;

        }
        return view('purchase.order.order_confirmation',compact('name','total_amount','cart_session_id'));
        }
        else{
            flash('Your session time is over. Create your cart again.')->message();
            return redirect()->back();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param $order_id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show($order_id)
    {
        $order=Order::where('id',$order_id)->first();
        $products=$order->cart->products();
        $item_count=$order->cart->products()->count();
        return view('purchase.order.order_details',compact('order','products','item_count'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $requestData = $request->all();
        $order = $this-> orderRepository->showData($id);
        $order->update($requestData);
        return response()->json($order,200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this -> orderRepository -> handleDelete($id);

        return response()->json(null,204);
    }

    public function orderConfirmed($cart_session_id){
        $orders=Order::where('cart_session_id',$cart_session_id)->get();
        return view('purchase.order.orders',compact('orders'));

    }

    public function orderReceived($cart_id){

        $carts=Cart::with(array('products' => function($query) use($productIdArray)
                {
                    $query->whereIn('product_id', $productIdArray);
                }))->get();

    }
}
