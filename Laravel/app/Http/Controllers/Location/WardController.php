<?php

namespace App\Http\Controllers\Location;

use App\Cakeapp\Location\Model\Municipal;
use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Cakeapp\Location\Model\Ward;
use Illuminate\Http\Request;

class WardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $keyword = $request->get('search');
        $perPage = 25;

        if (!empty($keyword)) {
            $ward = Ward::where('title', 'LIKE', "%$keyword%")
                ->orWhere('content', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $ward = Ward::latest()->paginate($perPage);
        }


        return view('Location.ward.index', compact('ward'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $municipality = Municipal::pluck('municipal_name','id')->toArray();

        return view('Location.ward.create',compact('municipality'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        
        $requestData = $request->all();
        
        Ward::create($requestData);

        return redirect('ward')->with('flash_message', 'Ward added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        $ward = Ward::findOrFail($id);

        return view('locality.ward.show', compact('ward'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        $ward = Ward::findOrFail($id);

        return view('locality.ward.edit', compact('ward'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Request $request, $id)
    {
        
        $requestData = $request->all();
        
        $ward = Ward::findOrFail($id);
        $ward->update($requestData);

        return redirect('ward')->with('flash_message', 'Ward updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        Ward::destroy($id);

        return redirect('ward')->with('flash_message', 'Ward deleted!');
    }
}
