<?php

namespace App\Http\Controllers\Backend\Role;

use App\Http\Controllers\Controller;
use App\Http\Requests\Role\CreateRoleRequest;
use App\Http\Requests\Role\UpdateRoleRequest;
use App\Models\Permission\Permission;
use App\Models\Role\Role;
use App\Repository\Backend\Role\RoleRepository;
use App\Services\RoleFormFields;
use App\Traits\RolesAndPermissionsHelpersTrait;
use Illuminate\Http\Request;

class RolesController extends Controller
{
    use RolesAndPermissionsHelpersTrait;
    /**
     * @var \App\Repository\Backend\Role\RoleRepository
     */
    private $repository;

    public function __construct(RoleRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return view('backend.role.index');
    }

    public function getDataTable()
    {
        $roles = $this->sortedRolesWithPermissionsAndUsers();
        return $this->repository->getForDataTable($roles);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        if(!hasPermissions('admin.role.created')){
            abort(403);
        }
        $service = new RoleFormFields();
        $data = $service->handle();
        return view('backend.role.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\Role\CreateRoleRequest  $request
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(CreateRoleRequest $request)
    {
        $roleData = $request->roleFillData();
        $rolePermissions = $request->get('permissions');
        $this->storeRoleWithPermissions($roleData, $rolePermissions);
        return redirect()->route('admin.role.index')->with('success','Role created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($id)
    {
        if(!hasPermissions('admin.role.edit')){
            abort(403);
        }
        $service = new RoleFormFields($id);
        $data = $service->handle();
        return view('backend.role.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Role\UpdateRoleRequest  $request
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(UpdateRoleRequest $request, $id)
    {
        $roleData = $request->roleFillData();
        $rolePermissions = $request->get('permissions');
        $this->updateRoleWithPermissions($id, $roleData, $rolePermissions);
        return redirect()->route('admin.role.index')->with('success','Role updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        if(!hasPermissions('admin.role.destroy')){
            abort(403);
        }
        $this->deleteRole($id);
        return redirect()->back()->with('success', 'Role deleted successfully');
    }
}
