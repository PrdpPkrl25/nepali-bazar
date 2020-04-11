<?php

namespace App\Mail;

use App\Console\Commands\RandomNumber;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class LuckyNumber extends Mailable
{
    use Queueable, SerializesModels;
    public $randomnumber;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($randomnumber)
    {

        $this->randomnumber = $randomnumber;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('Pradip.Pokhrel25@gmail.com')-> view('emails.luckynumber')->with(['number'=>$this->randomnumber]);
    }
}
