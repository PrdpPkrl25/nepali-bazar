<?php

namespace App\Cakeapp\Delivery\Model;



use App\Cakeapp\Common\Eloquent\Repository;

class DeliveryPersonRepository extends Repository
{

    /**
     * Specify Model class name
     * @return mixed
     */
    public function model()
    {
        return DeliveryPerson::class;
    }

    public function getIndexViewData(){
        return DeliveryPerson::all();
    }

    public function handleCreate($request)
    {
        $deliveryperson = $this -> create($request -> all());
        return $deliveryperson;
    }

    public function showData($id)
    {
        $deliveryperson = $this -> findOrFail($id);
        return $deliveryperson;
    }

    public function handleDelete($id)
    {
        $deliveryperson = $this -> findOrFail($id);
        $deliveryperson -> delete();
    }

}
