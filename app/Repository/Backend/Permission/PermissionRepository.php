<?php


namespace App\Repository\Backend\Permission;


use App\Exceptions\GeneralException;
use App\Models\Permission\Permission;
use Illuminate\Support\Str;
use Yajra\DataTables\Facades\DataTables;

class PermissionRepository
{
    public function getForDataTable($sortedPermissionsRolesUsers)
    {
//        return Datatables::of(Permission::orderBy('id', 'desc')->get())
        return Datatables::of($sortedPermissionsRolesUsers)
            ->escapeColumns([])
            ->addColumn('name', function ($permission) {
                if ($permission['permission']->name) {
                    return $permission['permission']->name;
                }
            })
            ->addColumn('slug', function ($permission) {
                if ($permission['permission']->slug) {
                    return $permission['permission']->slug;
                }
            })
            ->addColumn('description', function ($permission) {
                if ($permission['permission']->description) {
                    return $permission['permission']->description;
                }
            })
            ->addColumn('roles', function ($permission) {
                $roles = '';
                if ($permission['roles']->count() > 0) {
                    foreach($permission['roles'] as $role ){
                        $roles .= '<span class="badge bg-success">'.$role->name.'</span>';
                    }
                }else {
                    $roles = 'None';
                }
                return rtrim($roles, ',');
            })
            ->addColumn('created_at', function ($permission) {
                if ($permission['permission']->created_at) {
                    return $permission['permission']->created_at->format('j F Y h:i');
                }
            })
            ->addColumn('updated_at', function ($permission) {
                if ($permission['permission']->updated_at) {
                    return $permission['permission']->updated_at->format('j F Y h:i');
                }
            })
            ->addColumn('actions', function ($permission) {
                return $permission['permission']->action_buttons;
            })
            ->make(true);
    }

    public function getDeletedPermissionsForDataTable($deletedPermissions)
    {
        return Datatables::of($deletedPermissions)
            ->escapeColumns([])
            ->addColumn('name', function ($permission) {
                if ($permission->name) {
                    return $permission->name;
                }
            })
            ->addColumn('slug', function ($permission) {
                if ($permission->slug) {
                    return $permission->slug;
                }
            })
            ->addColumn('description', function ($permission) {
                if ($permission->description) {
                    return $permission->description;
                }
            })
            ->addColumn('roles', function ($permission) {
                $roles = '';
                if ($permission['roles']->count() > 0) {
                    foreach($permission['roles'] as $role ){
                        $roles .= '<span class="badge bg-success">'.$role->name.'</span>';
                    }
                }else {
                    $roles = 'None';
                }
                return rtrim($roles, ',');
            })
            ->addColumn('created_at', function ($permission) {
                if ($permission->created_at) {
                    return $permission->created_at->format('j F Y h:i');
                }
            })
            ->addColumn('updated_at', function ($permission) {
                if ($permission->updated_at) {
                    return $permission->updated_at->format('j F Y h:i');
                }
            })
            ->addColumn('deleted_at', function ($permission) {
                if ($permission->deleted_at) {
                    return $permission->deleted_at->format('j F Y h:i');
                }
            })
            ->addColumn('actions', function ($permission) {
                return $permission->deleted_buttons;
            })
            ->make(true);
    }

    public function storePermission(array $request)
    {
        $slug = Str::slug($request['slug'], '-');
        $permissionFound = Permission::where('slug', $slug)->get()->count();
        if ($permissionFound) {
            return false;
        }

        $permission = new Permission();
        $permission->name = $request['name'];
        $permission->slug = $slug;
        if($permission->save()){
            return true;
        }
    }

    public function updatePermission($request, $id)
    {
        $slug = Str::slug($request['slug'], '-');
        $permissionFound = Permission::where('slug', $slug)->where('id','!=', $id)->get()->count();
        if ($permissionFound) {
            return false;
        }

        $permission = Permission::findOrFail($request['id']);
        $permission->name = $request['name'];
        $permission->slug = $slug;
        if($permission->save()){
            return true;
        }
    }
}
