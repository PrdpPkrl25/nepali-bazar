<?php


namespace App\Cakeapp\User\Permission;


use App\Cakeapp\Product\Model\Category;
use App\Cakeapp\Product\Model\Product;
use App\Exceptions\PermissionDeniedException;
use Illuminate\Support\Facades\Auth;

trait CheckPermissionTrait
{
    public function checkAllowedAccess($parameter){
        $user=Auth::user();
        if(!$user->can($parameter)){
           throw new PermissionDeniedException();
        }
    }
}
