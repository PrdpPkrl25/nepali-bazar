<?php

namespace App\Http\Controllers\Web\Vendor;

use App\Cakeapp\Vendor\Model\OwnerRepository;
use App\Http\Resources\Vendor\OwnerCollection;
use App\Http\Resources\Vendor\OwnerResource;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class OwnerController extends Controller
{
    private $ownerRepository;

    public function __construct(OwnerRepository $ownerRepository)
    {
        $this -> ownerRepository = $ownerRepository;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $owners = $this-> ownerRepository -> getIndexViewData();
        return new OwnerCollection($owners);
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
        $owner = $this->ownerRepository->handleCreate($request);
        return response()->json($owner,200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Owner  $owner
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $owner = $this->ownerRepository->showData($id);
        return new OwnerResource($owner);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Owner  $owner
     * @return \Illuminate\Http\Response
     */
    public function edit(Owner $owner)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Owner  $owner
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $requestData = $request->all();
        $owner = $this-> ownerRepository->showData($id);
        $owner->update($requestData);
        return response()->json($owner,200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Owner  $owner
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this -> ownerRepository -> handleDelete($id);
        return response()->json(null,204);
    }
}
