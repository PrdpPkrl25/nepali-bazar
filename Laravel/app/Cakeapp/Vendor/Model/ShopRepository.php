<?php

namespace App\Cakeapp\Vendor\Model;



use App\Cakeapp\Common\Eloquent\Repository;
use App\Cakeapp\Location\Model\District;
use App\Cakeapp\Location\Model\Municipal;
use App\Cakeapp\Location\Model\Province;
use App\Cakeapp\Location\Model\Ward;
use App\Cakeapp\Product\Model\Product;
use App\Cakeapp\User\Model\Role;
use App\Cakeapp\User\Model\User;
use App\Mail\ShopCreated;
use App\Mail\ShopCreatedMail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

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
        $image_name=null;
        if(isset($request->shop_image_name)){
            $image_name=$request->shop_image_name->getClientOriginalName();
            $request->shop_image_name->storeAs('images/shop',$image_name);
        }
        $shop = $this -> create($request -> all() + ['image_name'=>$image_name,'owner_id'=>Auth::id()]);
        Owner::create(['user_id'=>Auth::id(),'shop_id'=>$shop->id]);
        $shopArray=Shop::where('owner_id',Auth::id())->get();
        if($shopArray->isEmpty()){
            $role=Role::where('label','owner')->first();
            \auth()->user()->roles()->attach($role->id);
        }
        $email=Auth::user()->email;
        Mail::to($email)->send(new ShopCreatedMail($shop));
        return $shop;
    }

    public function getData($id)
    {
       return $this->findOrFail($id);
    }

    public function ownerData($id)
    {
        return Shop::refactorShop()->findOrFail($id);
    }


    public function handleEdit($request,$id)
    {
        $image_name=null;
        if(isset($request->shop_image_name)){
            $image_name=$request->shop_image_name->getClientOriginalName();
            $request->shop_image_name->storeAs('images/shop',$image_name);
        }
        $province=Province::where('province_name',$request->province)->first();
        $district=District::where('district_name',$request->district)->first();
        $municipal=Municipal::where('municipal_name',$request->municipal)->first();
        $ward=Ward::where('ward_number',$request->ward_number)->first();
        Shop::where('id',$id)->update(['shop_name'=>$request->name,'email'=>$request->email,'phone_number'=>$request->phone_number,'province_id'=>$province->id,'district_id'=>$district->id,'municipal_id'=>$municipal->id,'ward_id'=>$ward->id,'locality'=>$request->locality,'delivery_charge'=>$request->delivery_charge,'image_name'=>$image_name]);

    }

    public function handleDelete($id)
    {
        $shop = $this -> findOrFail($id);
        $shop -> delete();
    }

}
