<?php


namespace App\Cakeapp\Delivery\Model;


use App\Cakeapp\Common\Eloquent\Repository;

class DeliveryRepository extends Repository
{

    /**
     * Specify Model class name
     * @return mixed
     */
    public function model()
    {
        return Delivery::class;
    }

    public function handleCreate($request)
    {
        $delivery = $this -> create($request -> all());
        return $delivery;
    }

    public function showData($id)
    {
        $delivery = $this -> findOrFail($id);
        return $delivery;
    }

    public function handleDelete($id)
    {
        $delivery = $this -> findOrFail($id);
        $delivery -> delete();
    }
}
