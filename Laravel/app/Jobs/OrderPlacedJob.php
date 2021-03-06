<?php

namespace App\Jobs;

use App\Cakeapp\Purchase\Model\Order;
use App\Mail\OrderPlacedMail;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class OrderPlacedJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    protected  $orders;
    protected  $email;

    /**
     * Create a new job instance.
     *
     * @param $orders
     * @param $email
     */
    public function __construct($orders,$email)
    {
        $this->orders=$orders;
        $this->email=$email;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        Mail::to($this->email)->send(new OrderPlacedMail($this->orders));
    }
}
