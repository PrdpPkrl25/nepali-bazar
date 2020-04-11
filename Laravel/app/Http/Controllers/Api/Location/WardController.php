<?php

namespace App\Http\Controllers\Api\Location;

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



    public function index(Request $request)
    {
        $ward = Ward ::all();


        return response($ward, 200);
    }

    /**
     * Show the form for creating a new resource.
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $municipality = Municipal ::pluck('municipal_name', 'id') -> toArray();

        return view('Location.ward.create', compact('municipality'));
    }

    /**
     * Store a newly created resource in storage.
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {

        $ward= $this-> wardRepository -> handleCreate($request);

        return redirect('ward') -> with('flash_message', 'Ward added!');
    }

    /**
     * Display the specified resource.
     * @param  int $id
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        $ward = $this-> wardRepository-> showData($id);

        return view('location.ward.show', compact('ward'));
    }

    /**
     * Show the form for editing the specified resource.
     * @param  int $id
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        $ward = $this-> wardRepository->showData($id);

        return view('locality.ward.edit', compact('ward'));
    }

    /**
     * Update the specified resource in storage.
     * @param \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Request $request, $id)
    {
        $ward = $this-> wardRepository->showData($id);

        return redirect('ward') -> with('flash_message', 'Ward updated!');
    }

    /**
     * Remove the specified resource from storage.
     * @param  int $id
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {

        $this->wardRepository->handleDelete($id);

        return redirect('ward') -> with('flash_message', 'Ward deleted!');
    }
}
