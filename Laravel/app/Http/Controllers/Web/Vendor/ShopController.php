<?php

namespace App\Http\Controllers\Web\Vendor;

use App\Cakeapp\Location\Model\Province;
use App\Cakeapp\Product\Model\Product;
use App\Cakeapp\Vendor\Model\ShopRepository;
use App\Http\Resources\Vendor\ShopCollection;
use App\Http\Resources\Vendor\ShopResource;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Cakeapp\Vendor\Model\Shop;
use App\Http\Requests\Vendor\StoreShopRequest;

class ShopController extends Controller
{
    /**
     * @var ShopRepository
     */
    private $shopRepository;


    /**
     * ShopController constructor.
     * @param ShopRepository $shopRepository
     */
    public function __construct(ShopRepository $shopRepository)
    {
        $this -> shopRepository = $shopRepository;
    }

    /**
     * Display a listing of the resource.
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $shops = $this-> shopRepository -> getIndexViewData();
        return new ShopCollection($shops);
    }

    /**
     * Show the form for creating a new resource.
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        $this->checkAllowedAccessForController('create-shop');
        $allProvince = Province::get();
        return view(' shop.create_shop', compact('allProvince'));
    }

    /**
     * Store a newly created resource in storage.
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function store(StoreShopRequest $request)
    {
        $shop = $this -> shopRepository -> handleCreate($request);
        return view('home');
    }

    /**
     * Display the specified resource.
     * @param $shop_id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show($shop_id)
    {
       $shop = $this -> shopRepository -> getData($shop_id);
       $products=Product::where('shop_id',$shop_id)->paginate(12);
       return view('shop.shop_profile',compact('shop','products'));
    }

    /**
     * Show the form for editing the specified resource.
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

    }

    /**
     * Update the specified resource in storage.
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $requestData = $request->all();
        $shop = $this-> shopRepository->showData($id);
        $shop->update($requestData);
        return response()->json($shop,200);
    }

    /**
     * Remove the specified resource from storage.
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this -> shopRepository -> handleDelete($id);
        return response()->json(null,204);
    }
}
