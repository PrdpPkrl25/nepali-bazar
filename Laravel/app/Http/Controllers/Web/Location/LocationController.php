<?php

namespace App\Http\Controllers\Web\Location;

use App\Cakeapp\Location\Model\Province;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LocationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function select()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    }

    /**
     * Display the specified resource.
     *
     * @param \App\province $province
     * @return \Illuminate\Http\Response
     */
    public function show(province $province)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\province $province
     * @return \Illuminate\Http\Response
     */
    public function edit(province $province)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\province $province
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, province $province)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\province $province
     * @return \Illuminate\Http\Response
     */
    public function destroy(province $province)
    {
        //
    }


}
