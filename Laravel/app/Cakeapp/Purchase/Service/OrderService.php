<?php


namespace App\Cakeapp\Purchase\Service;


use App\Cakeapp\Product\Model\Product;
use App\Cakeapp\Purchase\Model\Cart;
use App\Cakeapp\Purchase\Model\Order;
use App\Cakeapp\Vendor\Model\Shop;
use App\Jobs\OrderPlacedJob;
use App\Jobs\OrderReceivedJob;
use App\Mail\OrderPlacedMail;
use App\Mail\OrderReceivedMail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class OrderService
{
    public function createOrder($request){
        $carts = session()->get('cart');
        $orders=[];
        foreach ($carts as $cart){
           $order= $this->createCartOrder($request,$cart);
           $orders[]=$order;
        }
        $this->sendOrderDetailToCustomer($orders);
        return $orders;
    }

    public function createCartOrder($request,$cart){
        $total_price = 0.00;
        foreach ($cart->products as $product) {
            $total_price = $product->pivot->net_price + $total_price;
        }
        $cart_session_id=session()->get('cart_session_id');
        $delivery_charge=$cart->shop->delivery_charge;
        $attr=[
            'cart_id'=>$cart->id,
            'cart_session_id'=>$cart_session_id,
            'name'=>$request->name,
            'phone_number'=>$request->phone_number,
            'district'=>$request->district,
            'municipal'=>$request->municipal,
            'ward_number'=>$request->ward_number,
            'locality'=>$request->locality,
            'order_date'=>now(),
            'payment_method'=>$request->cashondelivery,
            'total_price'=>$total_price,
            'delivery_charge'=>$delivery_charge,
            'total_amount'=>$total_price+$delivery_charge,
        ];
        $order=Order::create($attr);
        $this->sendOrderDetailToOwner($order,$cart);
        return $order;
    }

    public function sendOrderDetailToCustomer($orders){
        $email=Auth::user()->email;
        dispatch(new OrderPlacedJob($orders,$email));
    }

    public function sendOrderDetailToOwner($order,$cart){
            $shopId=$cart->shop_id;
            dispatch(new OrderReceivedJob($order,$shopId));

    }


}
