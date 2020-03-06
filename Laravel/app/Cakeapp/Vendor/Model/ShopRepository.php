<?php

namespace App\Cakeapp\Vendor\Model;



use App\Cakeapp\Common\Eloquent\Repository;

class ShopRepository extends Repository
{

    /**
     * Specify Model class name
     * @return mixed
     */
    public function model()
    {
        return Shop::class;
    }

    public function handleCreate($request)
    {
        $shop = $this -> create($request -> all());
        return $shop;
    }

    public function showData($id)
    {
        $shop = $this -> findOrFail($id);
        return $shop;
    }

    public function handleDelete($id)
    {
        $shop = $this -> findOrFail($id);
        $shop -> delete();
    }

}
