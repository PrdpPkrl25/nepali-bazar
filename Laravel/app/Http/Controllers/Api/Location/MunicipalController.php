<?php

namespace App\Http\Controllers\Api\Location;

use App\Cakeapp\Location\Model\MunicipalRepository;
use App\Cakeapp\Location\Model\Municipal;
use App\Cakeapp\Vendor\Model\ShopRepository;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MunicipalController extends Controller
{
    private $municipalRepository;

    public function __construct(MunicipalRepository $municipalRepository)
    {
        $this -> municipalRepository = $municipalRepository;
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Municipal::get();

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
        $municipal = $this -> municipalRepository -> handleCreate($request);

        return response()->json($municipal,200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Municipal  $municipal
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Municipal  $municipal
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Municipal  $municipal
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $requestData = $request->all();
        $municipal = $this-> municipalRepository->showData($id);
        $municipal->update($requestData);
        return response()->json($municipal,200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Municipal  $municipal
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->municipalRepository->handleDelete($id);

        return response()->json(null,204);
    }
}
