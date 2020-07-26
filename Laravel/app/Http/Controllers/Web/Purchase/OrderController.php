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
       $cartIdArray=Cart::where('user_id',Auth::id())->get()->pluck('id');
       $orders=Order::whereIn('cart_id',$cartIdArray)->get();

       return view('purchase.order.orders',compact('orders'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @param $cart_id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {

        $user=Auth::user();
        $user=User::with(['district','municipal','ward'])->findOrFail($user->id);
        if (session()->has('cart')) {
            $cart = session()->get('cart');
            $item_count=$cart->products->count();
            $total_price = 0.00;
            foreach ($cart->products as $product) {
                $total_price = $product->pivot->net_price + $total_price;

            }
            return view('purchase.order.create_order', compact('user','total_price','item_count'));
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
        $order = $this -> orderRepository -> handleCreate($request);
        session()->forget('cart');
        return view('purchase.order.order_confirmation',compact('order'));
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
}
