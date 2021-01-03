<?php

namespace App\Http\Controllers\Web\Ajax;

use App\Cakeapp\Location\Model\District;
use App\Cakeapp\Location\Model\Municipal;
use App\Cakeapp\Location\Model\Province;
use App\Cakeapp\Location\Model\Ward;
use App\Cakeapp\Product\Model\Product;
use App\Cakeapp\User\Model\User;
use App\Cakeapp\Vendor\Model\Shop;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AjaxController extends Controller
{

    public function select()
    {
        $provinces=Province::get();
        return view('index',compact('provinces'));
    }

    public function getDistrict(){
        $provinceId=\request()->input('province_id');
        $districts=District::where('province_id',$provinceId)->get();
        return $districts;
    }

    public function getMunicipal(){
        $districtId=\request()->input('district_id');
        $municipals=Municipal::where('district_id',$districtId)->get();
        return $municipals;
    }

    public function getWard(){
        $municipalId=\request()->input('municipal_id');
        $wards=Ward::where('municipal_id',$municipalId)->get();
        return $wards;
    }

    public function postInformation(){
        $provinceId=\request()->input('province_id');
        $districtId=\request()->input('district_id');
        $municipalId=\request()->input('municipal_id');
        $wardId=\request()->input('ward_id');
        $locality=\request()->input('locality');
        $phoneNumber=\request()->input('phone_number');
        User::where('id',Auth::id())->update(['province_id'=>$provinceId,'district_id'=>$districtId,'municipal_id'=>$municipalId,'ward_id'=>$wardId,'locality'=>$locality,'phone_number'=>$phoneNumber]);
        return route('home');
    }

    public function search(){
        $keyword=\request()->input('keyword');
        $products=Product::where('product_name','like',"%{$keyword}%")->limit(3)->get();
        $shops=Shop::where('shop_name','like',"%{$keyword}%")->limit(3)->get();
        $autoComplete='<ul class="dropdown-menu" style="display: block;position: relative"><span class="dropdown-item-text">Product Results</span>';
        if($products->isEmpty()){
            $autoComplete .='<li><span class="dropdown-item-text" style="opacity: 0.6;">No Result</span></li>';
        }
        foreach ($products as $product){
            $autoComplete .='<li><a href="'.route('product.show',$product->id).'" class="dropdown-item " style="font-weight: bold">'.$product->product_name.'</a></li>';
        }
        $autoComplete.='<li class="dropdown-divider"></li> <span class="dropdown-item-text" >Shop Results</span>';
        if($shops->isEmpty()){
            $autoComplete .='<li><span class="dropdown-item-text" style="opacity: 0.6">No Result</span></li>';
        }
        foreach ($shops as $shop){
            $autoComplete .='<li><a href="'.route('shop.select',$shop->id).'" class="dropdown-item " style="font-weight: bold">'.$shop->shop_name.'</a></li>';
        }
        $autoComplete.='</ul>';
        return $autoComplete;
    }
}
