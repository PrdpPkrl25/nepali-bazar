<?php

namespace App\Cakeapp\Purchase\Model;



use App\Cakeapp\Common\Eloquent\Repository;
use App\Cakeapp\Purchase\Model\Order;
use App\Cakeapp\Purchase\Service\OrderService;
use App\Cakeapp\User\Model\User;
use Illuminate\Support\Facades\Auth;

class OrderRepository extends Repository
{

    /**
     * Specify Model class name
     * @return mixed
     */
    public function model()
    {
        return Order::class;
    }

    public function handleCreate($request)
    {

        if (session()->has('cart')) {
            $createOrder=new OrderService();
            $createOrder->createOrder($request);
            session()->forget('cart');
        }

        else{
            flash('Your session time is over. Create your cart again.')->message();
            return redirect()->back();
        }


    }

    public function showData($id)
    {
        $order = $this -> findOrFail($id);
        return $order;
    }

    public function handleDelete($id)
    {
        $order = $this -> findOrFail($id);
        $order -> delete();
    }

}
