<?php

namespace App\Cakeapp\Vendor\Model;



use App\Cakeapp\Common\Eloquent\Repository;
use Illuminate\Support\Facades\Auth;

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

    public function getIndexViewData(){
        return $this->all();
    }

    public function handleCreate($request)
    {
        $image_name=null;
        if(isset($request->shop_image_name)){
            $image_name=$request->shop_image_name->getClientOriginalName();
            $request->shop_image_name->storeAs('images/shop',$image_name);
        }
        $shop = $this -> create($request -> all() + ['image_name'=>$image_name,'owner_id'=>Auth::id()]);
        return $shop;
    }

    public function getData($shop_id)
    {
        return $this -> findOrFail($shop_id);
    }

    public function handleDelete($id)
    {
        $shop = $this -> findOrFail($id);
        $shop -> delete();
    }

}
