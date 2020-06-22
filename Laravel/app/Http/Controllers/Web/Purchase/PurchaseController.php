<?php

namespace App\Http\Controllers\Web\Purchase;

use App\Cakeapp\Purchase\Model\Purchase;
use App\Cakeapp\Purchase\Model\PurchaseRepository;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PurchaseController extends Controller
{

    /**
     * @var purchaseRepository
     */
    private $purchaseRepository;

    /**
     * PurchaseController constructor.
     * @param PurchaseRepository $purchaseRepository
     */
    public function __construct(PurchaseRepository $purchaseRepository)
    {
        $this -> purchaseRepository = $purchaseRepository;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Purchase::all();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $purchase = $this -> purchaseRepository -> handleCreate($request);

        return response()->json($purchase,200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Purchase  $purchase
     * @return \Illuminate\Http\Response
     */
    public function show(Purchase $purchase)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Purchase  $purchase
     * @return \Illuminate\Http\Response
     */
    public function edit(Purchase $purchase)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Purchase  $purchase
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $requestData = $request->all();
        $purchase = $this-> purchaseRepository->showData($id);
        $purchase->update($requestData);
        return response()->json($purchase,200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Purchase  $purchase
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this -> purchaseRepository -> handleDelete($id);

        return response()->json(null,204);
    }
}
