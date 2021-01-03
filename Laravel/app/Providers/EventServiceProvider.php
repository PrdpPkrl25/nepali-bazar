<?php

namespace App\Providers;


use App\Cakeapp\Common\Events\VisitItem;
use App\Cakeapp\Common\Listeners\CountItemVisitHandler;
use App\Cakeapp\User\Events\UserAuthenticated;
use App\Cakeapp\User\Events\UserLoggedOut;
use App\Cakeapp\User\Listeners\LoginListener;
use App\Cakeapp\User\Listeners\LogoutListener;
use Illuminate\Auth\Events\Login;
use Illuminate\Auth\Events\Logout;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],

        VisitItem::class => [
            CountItemVisitHandler::class,
        ],

        Login::class=>[
            LoginListener::class,
        ],

        Logout::class=>[
            LogoutListener::class,
        ],
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();

        //
    }

    /**
     * Determine if events and listeners should be automatically discovered.
     *
     * @return bool
     */
    public function shouldDiscoverEvents()
    {
        return true;
    }
}
