<?php

namespace App\Http\Controllers\Backend\Permission;

use App\Http\Controllers\Controller;
use App\Repository\Backend\Permission\PermissionRepository;
use App\Traits\RolesAndPermissionsHelpersTrait;
use Illuminate\Http\Request;

class PermissionsDeletedController extends Controller
{

    use RolesAndPermissionsHelpersTrait;
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
        return view('backend.permission.deleted.index');
    }

    public function getDataTable()
    {
        $deletedPermissions = $this->getDeletedPermissions()->get();
        return $this->permissionRepository->getDeletedPermissionsForDataTable($deletedPermissions);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function restoreAllDeletedPermissions(Request $request)
    {
        $deletedPermissions = $this->restoreAllTheDeletedPermissions();

        if ($deletedPermissions['status'] === 'success') {
            return redirect()->route('laravelroles::roles.index')
                ->with('success', trans_choice('laravelroles::laravelroles.flash-messages.successRestoredAllPermissions', $deletedPermissions['count'], ['count' => $deletedPermissions['count']]));
        }
        return redirect()->route('admin.permissions-deleted')->with('success', 'Permissions restored successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $item = $this->getDeletedPermissionAndDetails($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function restorePermission(Request $request, $id)
    {
       $this->restoreDeletedPermission($id);
       return redirect()->route('admin.permissions-deleted')->with('success', 'Permission restored successfully');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroyAllDeletedPermissions(Request $request)
    {
        $deletedPermissions = $this->destroyAllTheDeletedPermissions();

        if ($deletedPermissions['status'] === 'success') {
            return redirect()->route('laravelroles::roles.index')
                ->with('success', trans_choice('laravelroles::laravelroles.flash-messages.successDestroyedAllPermissions', $deletedPermissions['count'], ['count' => $deletedPermissions['count']]));
        }
        return redirect()->route('admin.permissions-deleted')->with('success', 'Permissions removed successfully');
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
        $permission = $this->destroyPermission($id);
        return redirect()->route('admin.permissions-deleted')->with('success', 'Permission destroyed successfully');
    }
}
