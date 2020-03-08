<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class Printsomething extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'print:some';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'This command is used to display something.';

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
        $var= $this->ask('What do you want to display?');
        $this->info($var);
    }
}
