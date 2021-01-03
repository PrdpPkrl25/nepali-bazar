<?php

namespace App\Cakeapp\Common\Listeners;

use App\Cakeapp\Common\Events\VisitItem;
use App\Cakeapp\Common\Model\ViewCount;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Session\Store;
use Illuminate\Support\Facades\Auth;
use ReflectionClass;
use ReflectionException;

class CountItemVisitHandler
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
     * @param VisitItem $event
     * @return void
     * @throws ReflectionException
     */
    public function handle(VisitItem $event)
    {
             $model= new ReflectionClass($event->item);
             $table_id=$event->item->id;
             $session_id = session()->getId();
             $itemVisited=ViewCount::where('table_id',$table_id)->where('session_id',$session_id)->get();
             if($itemVisited->isEmpty()){
                 ViewCount::create(['user_id'=> Auth::id(),'table_id'=>$table_id,'model'=>$model->getShortName(),'session_id'=>$session_id]);
             }

    }


}
