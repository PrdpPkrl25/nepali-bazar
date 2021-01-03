<?php


namespace App\Cakeapp\Location\Model;


use App\Cakeapp\Common\Eloquent\Repository;

class MunicipalRepository extends Repository
{

    /**
     * Specify Model class name
     * @return mixed
     */
    public function model()
    {
        return Municipal::class;
    }

    public function handleCreate($request)
    {
        $municipal = $this -> create($request -> all());
        return $municipal;
    }

    public function showData($id)
    {
        $municipal = $this -> findOrFail($id);
        return $municipal;
    }

    public function handleDelete($id)
    {
        $municipal = $this -> findOrFail($id);
        $municipal -> delete();
    }
}
