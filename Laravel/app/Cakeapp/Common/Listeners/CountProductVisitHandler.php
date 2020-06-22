<?php

namespace App\Cakeapp\Common\Listeners;

use App\Cakeapp\Common\Events\VisitProduct;
use App\Cakeapp\Common\Model\ViewCount;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Session\Store;
use Illuminate\Support\Facades\Auth;
use ReflectionClass;
use ReflectionException;

class CountProductVisitHandler
{
    private $session;

    /**
     * Create the event listener.
     *
     * @param Store $session
     */
    public function __construct(Store $session)
    {
        $this->session = $session;
    }

    /**
     * Handle the event.
     *
     * @param VisitProduct $event
     * @return void
     * @throws ReflectionException
     */
    public function handle(VisitProduct $event)
    {
             $model= new ReflectionClass($event->item);
             $table_id=$event->item->id;
             $session_id = session()->getId();
             ViewCount::create(['user_id'=> Auth::id(),'table_id'=>$table_id,'model'=>$model->getShortName(),'session_id'=>$session_id]);
           //check if current product_id view count exists in database with session id
           //Yes: dont update view count
           //No:update view count and session id
    }


}
