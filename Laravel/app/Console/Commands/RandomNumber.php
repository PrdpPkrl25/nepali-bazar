<?php

namespace App\Console\Commands;

use App\Mail\LuckyNumber;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;

class RandomNumber extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'generate:number';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Generates Random Number';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $number=rand(0,100);
        Mail::to('Prakash.Pokhrel111@gmail.com')->send(new LuckyNumber($number));


    }
}
