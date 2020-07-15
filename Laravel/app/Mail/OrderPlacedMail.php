<?php

namespace App\Mail;

use App\Cakeapp\Purchase\Model\Order;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class OrderPlacedMail extends Mailable
{
    use Queueable, SerializesModels;

   protected  $order;

    /**
     * Create a new message instance.
     *
     * @param Order $order
     */
    public function __construct(Order $order)
    {
        $this->order=$order;

    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('nepalibazar@gmail.com')->markdown('emails.purchase.order.order_confirmation')->with([
            'orderName' => $this->order->name,
            'orderPrice' => $this->order->total_amount,
        ]);;
    }
}
