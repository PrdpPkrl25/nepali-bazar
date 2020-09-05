<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class OrderReceivedMail extends Mailable
{
    use Queueable, SerializesModels;

    protected $order;
    protected $shopId;

    /**
     * Create a new message instance.
     *
     * @param $order
     * @param $shopId
     */
    public function __construct($order,$shopId)
    {
        $this->order=$order;
        $this->shopId=$shopId;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $products=$this->order->cart->products()->where('shop_id',$this->shopId)->get();
        return $this->from('nepalibazar@gmail.com')->markdown('emails.purchase.order.order_received')->with([
            'order'=>$this->order,
            'products'=>$products,
            'cartId'=>$this->order->cart_id,

        ]);
    }
}
