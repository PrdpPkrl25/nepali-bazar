<?php

namespace App\Console\Commands;

use App\Cakeapp\Location\Model\Province;
use App\Cakeapp\User\Model\User;
use Illuminate\Console\Command;

class CreateProvince extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:province';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'This is command is used to create Province';

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
        $name=$this-> ask('Enter Province Name:');
        $number=$this-> ask('Enter Province Number:');
        $province_array=['province_name'=>$name,'province_number'=>$number];
        Province::create($province_array);
        Province::create($province_array);

    }
}
