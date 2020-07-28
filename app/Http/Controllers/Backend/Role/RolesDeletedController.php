<?php

namespace App\Http\Controllers\Backend\Role;

use App\Http\Controllers\Controller;
use App\Repository\Backend\Role\RoleRepository;
use App\Traits\RolesAndPermissionsHelpersTrait;
use Illuminate\Http\Request;

class RolesDeletedController extends Controller
{
    use RolesAndPermissionsHelpersTrait;
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
        return view('backend.role.deleted.index');
    }

    public function getDataTable()
    {
        $deletedRoles = $this->getDeletedRoles()->get();
        return $this->repository->getDeletedRolesForDataTable($deletedRoles);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function restoreAllDeletedRoles(Request $request)
    {
        $deletedPermissions = $this->restoreAllTheDeletedRoles();

        if ($deletedPermissions['status'] === 'success') {
            return redirect()->route('admin.roles-deleted')
                ->with('success', 'Roles restored successfully');
        }
        return redirect()->route('admin.roles-deleted')->with('error', 'Roles not restored');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $item = $this->getDeletedRole($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function restoreRole(Request $request, $id)
    {
        $this->restoreDeletedRole($id);
        return redirect()->route('admin.roles-deleted')->with('success', 'Role restored successfully');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroyAllDeletedRoles(Request $request)
    {
        $deletedPermissions = $this->destroyAllTheDeletedRoles();

        if ($deletedPermissions['status'] === 'success') {
            return redirect()->route('admin.roles-deleted')
                ->with('success', 'Role deleted successfully');
        }
        return redirect()->route('admin.roles-deleted')->with('error', 'Role not removed');
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
        $this->destroyRole($id);
        return redirect()->route('admin.roles-deleted')->with('success', 'Role destroyed successfully');
    }
}
