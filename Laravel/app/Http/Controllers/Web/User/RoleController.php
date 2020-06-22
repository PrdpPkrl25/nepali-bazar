<?php

namespace App\Http\Controllers\User;

use App\Cakeapp\User\Model\Role;
use App\Cakeapp\User\Model\RoleRepository;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RoleController extends Controller
{

    private $roleRepo;

    public function __construct(RoleRepository $roleRepo)
    {
        $this -> roleRepo = $roleRepo;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
      // $this->checkAllowAccess('edit_role');
        $roles = Role ::all();
        $permissions = $this -> roleRepo -> getPermissionOfAllRoles();
        return view('user.roles.roles_index', compact('roles', 'permissions'));
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
     * @param  \App\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function show(Role $role)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function edit(Role $role)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Role  $role
     * @return array|\Illuminate\Http\Response
     */
    public function update(Request $request, $roleId, $permissionId)
    {
        $value = $request -> value;
        $role = Role ::findOrFail($roleId);
        if($value) {
            $role -> permissions() -> attach($permissionId);

        } else {
            $role -> permissions() -> detach($permissionId);

        }
        return ['value' => request() -> all()];
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function destroy(Role $role)
    {
        //
    }
}
