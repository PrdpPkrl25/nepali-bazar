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
            $createOrder=new OrderService();
            return $orders=$createOrder->createOrder($request);

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
