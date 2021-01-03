<?php

namespace App\Cakeapp\Vendor\Model;



use App\Cakeapp\Common\Eloquent\Repository;

class OwnerRepository extends Repository
{

    /**
     * Specify Model class name
     * @return mixed
     */
    public function model()
    {
        return Owner::class;
    }

    public function getIndexViewData(){
        return Owner::all();
    }

    public function handleCreate($request)
    {
        $owner = $this -> create($request -> all());
        return $owner;
    }

    public function showData($id)
    {
        $owner = $this -> findOrFail($id);
        return $owner;
    }

    public function handleDelete($id)
    {
        $owner = $this -> findOrFail($id);
        $owner -> delete();
    }

}
