<?php


namespace App\Cakeapp\Purchase\Service;


use App\Cakeapp\Product\Model\Product;
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
        $this->sendOrderDetailToOwner($order,$cart);
        return $order;
    }
    public function placeOrderService($attr){

    }

    public function sendOrderDetailToCustomer($order){
        $email=Auth::user()->email;
        dispatch(new OrderPlacedJob($order,$email));
    }

    public function sendOrderDetailToOwner($order,$cart){

        $productIdsArray=$cart->products->pluck($cart->product_id);
        $distinctShopsIdArray=Product::whereIn('id',$productIdsArray)->get()->pluck('shop_id')->unique();
        foreach ($distinctShopsIdArray as $shopId){
            dispatch(new OrderReceivedJob($order,$shopId));

        }

    }


}
