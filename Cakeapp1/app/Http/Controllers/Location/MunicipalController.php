<?php

namespace App\Http\Controllers\Location;

use App\Cakeapp\Location\Model\Municipal;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MunicipalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $allMunicipal = Municipal::get();
        return view('Location.municipal',compact('allMunicipal'));
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Municipal  $municipal
     * @return \Illuminate\Http\Response
     */
    public function show(Municipal $municipal)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Municipal  $municipal
     * @return \Illuminate\Http\Response
     */
    public function edit(Municipal $municipal)
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
    public function update(Request $request, Municipal $municipal)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Municipal  $municipal
     * @return \Illuminate\Http\Response
     */
    public function destroy(Municipal $municipal)
    {
        //
    }
}
