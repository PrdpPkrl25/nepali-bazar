<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class WordsMagic extends Mailable
{
    use Queueable, SerializesModels;
    public $key;
    public $value;
    public $user;
    public $name;

    /**
     * Create a new message instance.
     *
     * @param $key
     * @param $value
     * @param $user
     */
    public function __construct($key,$value,User $user)
    {
        $this->key= $key;
        $this->value= $value;
        $this->name=$user->name;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('cakeapp@gmail.com')->view('emails.words')->with(['key'=>$this->key,'value'=>$this->value,'name'=>$this->name]);
    }
}
