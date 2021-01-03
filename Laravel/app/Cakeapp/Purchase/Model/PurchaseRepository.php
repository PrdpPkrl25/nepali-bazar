<?php

namespace App\Cakeapp\Purchase\Model;



use App\Cakeapp\Common\Eloquent\Repository;
use App\Cakeapp\Purchase\Model\Purchase;

class PurchaseRepository extends Repository
{

    /**
     * Specify Model class name
     * @return mixed
     */
    public function model()
    {
        return Purchase::class;
    }

    public function handleCreate($request)
    {
        $purchase = $this -> create($request -> all());
        return $purchase;
    }

    public function showData($id)
    {
        $purchase = $this -> findOrFail($id);
        return $purchase;
    }

    public function handleDelete($id)
    {
        $purchase = $this -> findOrFail($id);
        $purchase -> delete();
    }

}
