<?php


namespace App\Cakeapp\Location\Model;

use App\Cakeapp\Common\Eloquent\Repository;
use App\Cakeapp\Location\Model\Ward;

class WardRepository extends Repository
{
    /**
     * Specify Model class name
     * @return mixed
     */
    public function model()
    {
        return Ward::class;
    }

    public function handleCreate($request)
    {
        $ward = $this -> create($request -> all());
        return $ward;
    }

    public function showData($id)
    {
        $ward = $this -> findOrFail($id);
        return $ward;
    }

    public function handleDelete($id)
    {
        $ward = $this -> findOrFail($id);
        $ward -> delete();
    }
}
