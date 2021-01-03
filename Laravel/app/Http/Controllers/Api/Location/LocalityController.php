<?php

namespace App\Http\Controllers\Api\Location;

use App\Cakeapp\Location\Model\Locality;
use App\Cakeapp\Location\Model\Municipal;
use App\Http\Controllers\Controller;
use App\Http\Requests\Location\StoreLocalityRequest;
use Illuminate\Http\Request;

class LocalityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $allLocality = Locality::get();
        return view('location.locality.locality', compact('allLocality'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('location.locality.localitydetail');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreLocalityRequest $request)
    {

        $municipal_name=$request->all()['municipal'];
        $municipal_object= Municipal::where('municipal_name','=',$municipal_name)->first();
        $municipal_id=$municipal_object->id;
        $locality_array=['locality_name'=>$request->all()['locality_name'],'municipal_id'=>$municipal_id];
        Locality::create($locality_array);
        return redirect()->route('locality');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Locality  $locality
     * @return \Illuminate\Http\Response
     */
    public function show(Locality $locality)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Locality  $locality
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $locality = Locality::find($id);
        return view('location.locality.localityedit',compact('locality'));


    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Locality  $locality
     * @return \Illuminate\Http\Response
     */
    public function update(StoreLocalityRequest $request, $id)
    {
        $locality=Locality::where('id','=',$id)->first();
        $locality->locality_name = $request->input('locality_name');
        $locality->save();
        return redirect()->route('locality');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Locality  $locality
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $locality= Locality::find($id);
        $locality->delete();
        return redirect()->route('locality');
    }


}
