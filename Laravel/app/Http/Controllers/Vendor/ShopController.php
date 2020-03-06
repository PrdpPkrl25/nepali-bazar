<?php

namespace App\Http\Controllers\Vendor;

use App\Cakeapp\Vendor\Model\ShopRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Cakeapp\Vendor\Model\Shop;
use App\Http\Requests\Vendor\StoreShopRequest;
use function PHPUnit\Framework\StaticAnalysis\HappyPath\AssertIsArray\consume;

class ShopController extends Controller
{
    /**
     * @var ShopRepository
     */
    private $shopReporsitory;

    /**
     * ShopController constructor.
     * @param ShopRepository $shopReporsitory
     */
    public function __construct(ShopRepository $shopReporsitory)
    {
        $this -> shopReporsitory = $shopReporsitory;
    }

    /**
     * Display a listing of the resource.
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $allShop = Shop ::get();
        return view('vendor.shop.index', compact('allShop'));
    }

    /**
     * Show the form for creating a new resource.
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('vendor.shop.create');
    }

    /**
     * Store a newly created resource in storage.
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreShopRequest $request)
    {
        $shop = $this -> shopReporsitory -> handleCreate($request);

        return redirect() -> route('shops.index');
    }

    /**
     * Display the specified resource.
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $shop = $this -> shopReporsitory -> showData($id);

        return view('Vendor.shop.show', compact('shop'));
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
        //
    }

    /**
     * Remove the specified resource from storage.
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this -> shopReporsitory -> handleDelete($id);

        return redirect() -> route('shops.index');
    }
}
