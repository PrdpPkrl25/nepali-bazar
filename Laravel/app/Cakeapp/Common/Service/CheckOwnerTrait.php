<?php


namespace App\Cakeapp\Common\Service;


use App\Cakeapp\Product\Model\Product;
use App\Cakeapp\Vendor\Model\Shop;
use App\Scopes\ActiveScope;
use Illuminate\Support\Facades\Auth;

trait CheckOwnerTrait
{
    public function ownerProduct($user=null){
        $user = $user?$user:Auth::user();
        $shop=Shop::where('owner_id',$user->id)->first();
        if($shop instanceof Shop){
            $shopIdsArray= $user->shops->pluck('id');
            return Product::withoutGlobalScopes()->whereIn('shop_id',$shopIdsArray)->pluck('id');
        }
        abort('404');
    }

    public function ownerShop($user=null){
        $user = $user?$user:Auth::user();
        $shop=Shop::where('owner_id',$user->id)->first();
        if($shop){
            return $user->shops->pluck('id');
        }
        abort('404');
    }

}
