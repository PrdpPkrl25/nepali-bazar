<?php

namespace App\Http\Controllers\Web\Delivery;

use App\Cakeapp\Delivery\Model\DeliveryPerson;
use App\Cakeapp\Delivery\Model\DeliveryPersonRepository;
use App\Http\Controllers\Controller;
use App\Http\Resources\Delivery\DeliveryPersonCollection;
use App\Http\Resources\Delivery\DeliveryPersonResource;
use Illuminate\Http\Request;

class DeliveryPersonController extends Controller
{
    private $deliverypersonRepository;

    public function __construct(DeliveryPersonRepository $deliverypersonRepository)
    {
        $this -> deliverypersonRepository = $deliverypersonRepository;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $deliveryperson = $this-> deliverypersonRepository -> getIndexViewData();
        return new DeliveryPersonCollection($deliveryperson);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $deliveryperson = $this -> deliverypersonRepository -> handleCreate($request);
        return response()->json($deliveryperson,200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\DeliveryPerson  $deliveryPerson
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $deliveryperson = $this -> deliverypersonRepository -> showData($id);
        return new DeliveryPersonResource($deliveryperson);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\DeliveryPerson  $deliveryPerson
     * @return \Illuminate\Http\Response
     */
    public function edit(DeliveryPerson $deliveryPerson)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\DeliveryPerson  $deliveryPerson
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $requestData = $request->all();
        $deliveryperson = $this-> deliverypersonRepository->showData($id);
        $deliveryperson->update($requestData);
        return response()->json($deliveryperson,200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\DeliveryPerson  $deliveryPerson
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this -> deliverypersonRepository -> handleDelete($id);
        return response()->json(null,204);
    }
}
