<?php

namespace App\Cakeapp\User\Listeners;

use App\Cakeapp\User\Model\AuthenticationLog;
use Illuminate\Auth\Events\Logout;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Session;

class LogoutListener
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {

    }

    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle(Logout $event)
    {
        $authenticationLogId=session()->get('authenticationLogId');
        $authenticationLog=AuthenticationLog::where('id',$authenticationLogId)->first();
        if($authenticationLog instanceof AuthenticationLog){
           /* $authenticationLog->logout_time=now();
            $authenticationLog->save();*/
            AuthenticationLog::where('id',$authenticationLogId)->update(['logout_time'=>now()]);
        }
    }
}
