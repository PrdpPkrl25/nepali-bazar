<?php

namespace App\Cakeapp\User\Listeners;

use App\Cakeapp\User\Events\UserAuthenticated;
use App\Cakeapp\User\Model\AuthenticationLog;
use Illuminate\Auth\Events\Login;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Session;

class LoginListener
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle(Login $event)
    {
        $attr=[
            'user_id'=>$event->user->id,
            'login_time'=>now(),
            'ip_address'=>Request::ip(),
            'session_id'=>Session::getId(),
            ];
        $authenticationLog=AuthenticationLog::create($attr);
        Session::put('authenticationLogId',$authenticationLog->id);



    }


}
