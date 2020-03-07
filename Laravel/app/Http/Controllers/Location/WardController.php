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
<<<<<<< HEAD
=======

        $ward= $this-> wardRepository -> handleCreate($request);
>>>>>>> 3dd8c130fc517ca03ee08f02991b606530cc6dd1

        $requestData = $request -> all();

        Ward ::create($requestData);

        return redirect('ward') -> with('flash_message', 'Ward added!');
    }

    /**
     * Display the specified resource.
     * @param  int $id
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
<<<<<<< HEAD
        $ward = Ward ::findOrFail($id);
=======
        $ward = $this-> wardRepository-> showData($id);
>>>>>>> 3dd8c130fc517ca03ee08f02991b606530cc6dd1

        return view('location.ward.show', compact('ward'));
    }

    /**
     * Show the form for editing the specified resource.
     * @param  int $id
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
<<<<<<< HEAD
        $ward = Ward ::findOrFail($id);
=======
        $ward = $this-> wardRepository->showData($id);
>>>>>>> 3dd8c130fc517ca03ee08f02991b606530cc6dd1

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
<<<<<<< HEAD
=======

        $requestData = $request->all();
        $ward = $this-> wardRepository->showData($id);
        $ward->update($requestData);
>>>>>>> 3dd8c130fc517ca03ee08f02991b606530cc6dd1

        $requestData = $request -> all();

        $ward = Ward ::findOrFail($id);
        $ward -> update($requestData);

        return redirect('ward') -> with('flash_message', 'Ward updated!');
    }

    /**
     * Remove the specified resource from storage.
     * @param  int $id
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
<<<<<<< HEAD
        Ward ::destroy($id);
=======
        $this->wardRepository->handleDelete($id);
>>>>>>> 3dd8c130fc517ca03ee08f02991b606530cc6dd1

        return redirect('ward') -> with('flash_message', 'Ward deleted!');
    }
}
