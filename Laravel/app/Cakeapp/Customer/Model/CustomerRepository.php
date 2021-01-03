<?php

namespace App\Cakeapp\Customer\Model;



use App\Cakeapp\Common\Eloquent\Repository;

class CustomerRepository extends Repository
{

    /**
     * Specify Model class name
     * @return mixed
     */
    public function model()
    {
        return Customer::class;
    }

    public function getIndexViewData(){
        return Customer::all();
    }

    public function handleCreate($request)
    {
        $customer = $this -> create($request -> all());
        return $customer;
    }

    public function showData($id)
    {
        $customer = $this -> findOrFail($id);
        return $customer;
    }

    public function handleDelete($id)
    {
        $customer = $this -> findOrFail($id);
        $customer -> delete();
    }

}
