<?php

namespace App\Http\Controllers\Web\Delivery;

use App\Cakeapp\Delivery\Model\Delivery;
use App\Cakeapp\Delivery\Model\DeliveryRepository;
use App\Cakeapp\Purchase\Model\Order;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DeliveryController extends Controller
{
    private $deliveryRepository;

    public function __construct(DeliveryRepository $deliveryRepository)
    {
        $this -> deliveryRepository = $deliveryRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Delivery::all();
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
        $delivery = $this -> deliveryRepository -> handleCreate($request);
        return response()->json($delivery,200);

    }

    /**
     * Display the specified resource.
     *
     * @param $orderId
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show($orderId)
    {
        $order=Order::where('id',$orderId)->first();
        return view('delivery.order_delivery_detail',compact('order'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Delivery  $delivery
     * @return \Illuminate\Http\Response
     */
    public function edit(Delivery $delivery)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Delivery  $delivery
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $requestData = $request->all();
        $delivery = $this-> deliveryRepository->showData($id);
        $delivery->update($requestData);
        return response()->json($delivery,200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Delivery  $delivery
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this -> deliveryRepository -> handleDelete($id);
        return response()->json(null,204);
    }
}
