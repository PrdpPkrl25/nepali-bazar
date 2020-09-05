<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ShopCreatedMail extends Mailable
{
    use Queueable, SerializesModels;

    protected $shop;

    /**
     * Create a new message instance.
     *
     * @param $shop
     */
    public function __construct($shop)
    {
        $this->shop=$shop;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('nepalibazar@gmail.com')->markdown('emails.shop.shop_created')->with([
            'shop'=>$this->shop,
        ]);
    }
}
