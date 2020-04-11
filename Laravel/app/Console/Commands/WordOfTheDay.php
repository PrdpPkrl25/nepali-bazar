<?php

namespace App\Console\Commands;

use App\Cakeapp\User\Model\User;
use App\Mail\WordsMagic;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;

class WordOfTheDay extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'generate:word';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send Mail to all User with a word an its meaning ';

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
        $words = [
            'aberration' => 'a state or condition markedly different from the norm',
            'convivial' => 'occupied with or fond of the pleasures of good company',
            'diaphanous' => 'so thin as to transmit light',
            'elegy' => 'a mournful poem; a lament for the dead',
            'ostensible' => 'appearing as such but not necessarily so'
        ];

        $key= array_rand($words);
        $value=$words[$key];
        $users = User::all();
        foreach ($users as $user){
            Mail::to($user->email)->send(new WordsMagic($key,$value,$user));
        }
    }
}
