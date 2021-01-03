<?php

namespace App\Http\Controllers;

use App\Cakeapp\Product\Model\Product;
use App\Cakeapp\User\Permission\CheckPermissionTrait;
use App\Cakeapp\Vendor\Model\Owner;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests, CheckPermissionTrait;




}
