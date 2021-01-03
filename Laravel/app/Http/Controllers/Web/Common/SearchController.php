<?php

namespace App\Http\Controllers\Web\Common;

use App\Cakeapp\Product\Model\Product;
use App\Cakeapp\Vendor\Model\Shop;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function find(){
        $keyword=\request()->input('keyword');
        $products=Product::where('product_name','like',"%{$keyword}%")->get();
        $shops=Shop::where('shop_name','like',"%{$keyword}%")->get();
        return view('search.search_result',compact('products','shops'));
    }
}
