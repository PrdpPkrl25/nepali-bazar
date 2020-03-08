<?php

namespace App\Http\Controllers\Vendor;

use App\Cakeapp\Vendor\Model\ShopRepository;
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
        return  Shop ::all();
    }

    /**
     * Show the form for creating a new resource.
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreShopRequest $request)
    {
        $shop = $this -> shopRepository -> handleCreate($request);

        return response()->json($shop,200);
    }

    /**
     * Display the specified resource.
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       /* $shop = $this -> shopRepository -> showData($id);

        return view('Vendor.shop.show', compact('shop'));*/
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
