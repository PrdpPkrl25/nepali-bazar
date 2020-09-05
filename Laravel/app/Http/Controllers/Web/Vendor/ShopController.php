<?php

namespace App\Http\Controllers\Web\Vendor;

use App\Cakeapp\Common\Events\VisitItem;
use App\Cakeapp\Location\Model\Province;
use App\Cakeapp\Product\Model\Product;
use App\Cakeapp\Vendor\Model\ShopRepository;
use App\Http\Resources\Vendor\ShopCollection;
use App\Http\Resources\Vendor\ShopResource;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Cakeapp\Vendor\Model\Shop;
use App\Http\Requests\Vendor\StoreShopRequest;
use Illuminate\Support\Facades\Auth;

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
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $shops = Shop::with('province','district','municipal','ward')->where('owner_id',Auth::id())->get();
        return view('vendor.shop.shops',compact('shops'));
    }

    /**
     * Show the form for creating a new resource.
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        $allProvince = Province::get();
        return view(' vendor.shop.create_shop', compact('allProvince'));
    }

    /**
     * Store a newly created resource in storage.
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(StoreShopRequest $request)
    {
        $this -> shopRepository -> handleCreate($request);
        flash('Your shop is created successfully!')->success();
        return redirect()->route('home');
    }

    /**
     * Display the specified resource
     * @param $shopId
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show($shopId)
    {
       $shop = $this -> shopRepository -> getData($shopId);
        event(new VisitItem($shop));
       $products=Product::where('shop_id',$shopId)->paginate(12);
       return view('vendor.shop.shop_page',compact('shop','products'));
    }

    /**
     * Display the specified resource.
     * @param $shopId
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function info($shopId)
    {
        $this->checkAllowedAccess('edit-shop');
        $shop = $this -> shopRepository -> ownerData($shopId);
        return view('vendor.shop.shop_profile',compact('shop'));
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
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(StoreShopRequest $request, $id)
    {
        $this-> shopRepository->handleEdit($request,$id);
        return redirect()->route('shop.info',$id);
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
