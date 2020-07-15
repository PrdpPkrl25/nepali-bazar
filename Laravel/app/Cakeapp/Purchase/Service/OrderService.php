<?php


namespace App\Cakeapp\Purchase\Service;


use App\Cakeapp\Purchase\Model\Order;
use App\Mail\OrderPlacedMail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class OrderService
{
    public function createOrder($request){
        $cart = session()->get('cart');
        $total_price = 0.00;
        foreach ($cart->products as $product) {
            $total_price = $product->pivot->net_price + $total_price;
        }
        $delivery_charge=0;
        $attr=[
            'cart_id'=>$cart->id,
            'name'=>$request->name,
            'phone_number'=>$request->phone_number,
            'district'=>$request->district,
            'municipal'=>$request->municipal,
            'ward_number'=>$request->ward_number,
            'locality'=>$request->locality,
            'order_date'=>now(),
            'payment_method'=>$request->cashondelivery,
            'delivery_charge'=>$delivery_charge,
            'total_amount'=>$total_price+$delivery_charge,
        ];
        $order=Order::create($attr);
        $this->sendOrderDetailToCustomer($order);
    }
    public function placeOrderService($attr){

    }

    public function sendOrderDetailToCustomer($order){
        Mail::to(Auth::user()->email)->send(new OrderPlacedMail($order));
    }

    public function sendOrderDetailToOwner(){

    }
}