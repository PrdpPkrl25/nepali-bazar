<?php

namespace App\Http\Controllers;

use App\Cakeapp\Product\Model\Category;
use App\Cakeapp\Product\Model\Product;
use App\Cakeapp\Vendor\Model\Shop;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
       /* $this->middleware('auth');*/
        $this->middleware('check.address');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $foodProducts=Product::where('category_id',1)->take(5)->get();
        $groceryProducts=Product::where('category_id',5)->take(5)->get();
        $medicineProducts=Product::where('category_id',7)->take(5)->get();
        $stationeryProducts=Product::where('category_id',9)->take(5)->get();
        $electronicsProducts=Product::where('category_id',11)->take(5)->get();
        $hardwareProducts=Product::where('category_id',13)->take(5)->get();
        $shops=Shop::take(3)->get();
        return view('home',compact('foodProducts','groceryProducts','medicineProducts','stationeryProducts','electronicsProducts','hardwareProducts','shops'));
    }
}
