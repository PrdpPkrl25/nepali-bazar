<?php

namespace App\Mail;

use App\Cakeapp\Purchase\Model\Order;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class OrderPlacedMail extends Mailable
{
    use Queueable, SerializesModels;

   protected  $orders;

    /**
     * Create a new message instance.
     *
     * @param $orders
     */
    public function __construct($orders)
    {
        $this->orders=$orders;

    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $orderPrice=0.00;
        foreach ($this->orders as $order){
            $orderPrice=$order->total_amount+$orderPrice;
            $customerName=$order->name;
            $cartSessionId=$order->cart_session_id;
        }
        return $this->from('nepalibazar@gmail.com')->markdown('emails.purchase.order.order_confirmation')->with([
            'customerName' => $customerName,
            'orderPrice' => $orderPrice,
            'cartSessionId'=>$cartSessionId,
        ]);
    }
}
