<?php

namespace App\Http\Controllers\Web\Ajax;

use App\Cakeapp\Location\Model\District;
use App\Cakeapp\Location\Model\Municipal;
use App\Cakeapp\Location\Model\Ward;
use App\Cakeapp\User\Model\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AjaxController extends Controller
{
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

    public function postLocation(){
        $provinceId=\request()->input('province_id');
        $districtId=\request()->input('district_id');
        $municipalId=\request()->input('municipal_id');
        $wardId=\request()->input('ward_id');
        $locality=\request()->input('locality');
        User::where('id',Auth::id())->update(['province_id'=>$provinceId,'district_id'=>$districtId,'municipal_id'=>$municipalId,'ward_id'=>$wardId,'locality'=>$locality]);
        return route('home');
    }
}
