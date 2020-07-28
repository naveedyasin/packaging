<?php

namespace App\Http\Controllers\Backend\Permission;

use App\Http\Controllers\Controller;
use App\Http\Requests\Permission\CreatePermissionRequest;
use App\Http\Requests\Permission\UpdatePermissionRequest;
use App\Models\Permission\Permission;
use App\Repository\Backend\Permission\PermissionRepository;
use App\Services\PermissionFormFields;
use App\Traits\RolesAndPermissionsHelpersTrait;
use Illuminate\Http\Request;

class PermissionsController extends Controller
{

    use RolesAndPermissionsHelpersTrait;
    /**
     * @var \App\Repository\Backend\Permission\PermissionRepository
     */
    private $permissionRepository;

    public function __construct(PermissionRepository $permissionRepository)
    {
        $this->permissionRepository = $permissionRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return view('backend.permission.index');
    }

    public function getDataTable()
    {
        $items = $this->getSortedPermissionsRolesUsers();
        return $this->permissionRepository->getForDataTable($items);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        if(!hasPermissions('admin.permission.create')){
            abort(403);
        }
        $service = new PermissionFormFields();
        $data = $service->handle();
        return view('backend.permission.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\Permission\CreatePermissionRequest  $request
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(CreatePermissionRequest $request)
    {
        $permissionData = $request->permissionFillData();
        $this->storeNewPermission($permissionData);
        return redirect()->route('admin.permission.index')->with('success','Permission created successfully');
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
        if(!hasPermissions('admin.permission.edit')){
            abort(403);
        }
        $service = new PermissionFormFields($id);
        $data = $service->handle();
        return view('backend.permission.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Permission\UpdatePermissionRequest  $request
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(UpdatePermissionRequest $request, $id)
    {
        $permissionData = $request->permissionFillData($id);
        $this->updatePermission($id, $permissionData);
        return redirect()->route('admin.permission.index')->with('success','Permission updated successfully');
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
        if(!hasPermissions('admin.permission.destroy')){
            abort(403);
        }
        $this->deletePermission($id);
        return redirect()->back()->with('success', 'Permission deleted successfully');
    }
}
