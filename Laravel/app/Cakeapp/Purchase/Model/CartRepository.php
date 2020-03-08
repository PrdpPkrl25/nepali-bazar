<?php

namespace App\Cakeapp\Purchase\Model;



use App\Cakeapp\Common\Eloquent\Repository;
use App\Cakeapp\Purchase\Model\Cart;

class CartRepository extends Repository
{

    /**
     * Specify Model class name
     * @return mixed
     */
    public function model()
    {
        return Cart::class;
    }

    public function handleCreate($request)
    {
        $cart = $this -> create($request -> all());
        return $cart;
    }

    public function showData($id)
    {
        $cart = $this -> findOrFail($id);
        return $cart;
    }

    public function handleDelete($id)
    {
        $cart = $this -> findOrFail($id);
        $cart -> delete();
    }

}
