<?php

namespace App\Jobs;

use App\Cakeapp\Product\Model\Product;
use App\Cakeapp\Vendor\Model\Shop;
use App\Mail\OrderReceivedMail;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class OrderReceivedJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $order;
    protected $shopId;

    /**
     * Create a new job instance.
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
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
            $shop=Shop::with('products')->where('id',$this->shopId)->first();
            $ownerEmail=$shop->email;
            Mail::to($ownerEmail)->bcc(config('admin.admin_mail'))->queue(new OrderReceivedMail($this->order,$this->shopId));
    }
}
