<?php

namespace App\Http\Controllers\Location;

use App\Cakeapp\Location\Model\WardRepository;
use App\Cakeapp\Location\Model\Municipal;
use App\Http\Controllers\Controller;
use App\Cakeapp\Location\Model\Ward;
use Illuminate\Http\Request;

class WardController extends Controller
{

    private $wardRepository;

    public function __construct(WardRepository $wardRepository)
    {
        $this -> wardRepository = $wardRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @param Request $request
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

        $ward= $this-> wardRepository -> handleCreate($request);

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
        $ward = $this-> wardRepository-> showData($id);

        return view('location.ward.show', compact('ward'));
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
        $ward = $this-> wardRepository->showData($id);

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
        $ward = $this-> wardRepository->showData($id);
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
        $this->wardRepository->handleDelete($id);

        return redirect('ward')->with('flash_message', 'Ward deleted!');
    }
}
