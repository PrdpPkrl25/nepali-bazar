<?php

namespace App\Cakeapp\Vendor\Model;

use Illuminate\Database\Eloquent\Model;

class ShopReporsitory
{

    public function handleCreate($request)
    {
        $shop = Shop ::create($request -> all());
    }

    public function showData($id)
    {
        $shop = Shop ::findOrFail($id);
        return $shop;
    }

    public function handleDelete($id)
    {
        $shop = Shop ::findOrFail($id);
        $shop -> delete();
    }
}
