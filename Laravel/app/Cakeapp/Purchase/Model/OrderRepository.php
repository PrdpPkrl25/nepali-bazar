<?php

namespace App\Cakeapp\Purchase\Model;



use App\Cakeapp\Common\Eloquent\Repository;
use App\Cakeapp\Purchase\Model\Order;

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
        $order = $this -> create($request -> all());
        return $order;
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
