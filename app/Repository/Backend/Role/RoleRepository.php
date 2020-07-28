<?php


namespace App\Repository\Backend\Role;


use App\Models\Role\Role;
use Illuminate\Support\Str;
use Yajra\DataTables\Facades\DataTables;
class RoleRepository
{
    public function getForDataTable($roles)
    {
        return Datatables::of($roles)
            ->escapeColumns([])
            ->addColumn('name', function ($role) {
                if ($role['role']->name) {
                    return $role['role']->name;
                }
            })
            ->addColumn('slug', function ($role) {
                if ($role['role']->slug) {
                    return $role['role']->slug;
                }
            })
            ->addColumn('description', function ($role) {
                if ($role['role']->description) {
                    return $role['role']->description;
                }
            })
            ->addColumn('level', function ($role) {
                    return $role['role']->level;
            })
            ->addColumn('permissions', function ($role) {
                $permissions = '';
                if ($role['permissions']->count() > 0) {
                    foreach($role['permissions'] as $permission ){
                        $permissions .= '<span class="badge bg-success">'.$permission->name.'</span>';
                    }
                }else {
                    $permissions = 'None';
                }
                return $permissions;
            })
            ->addColumn('created_at', function ($role) {
                if ($role['role']->created_at) {
                    return $role['role']->created_at->format('j F Y h:i');
                }
            })
            ->addColumn('updated_at', function ($role) {
                if ($role['role']->updated_at) {
                    return $role['role']->updated_at->format('j F Y h:i');
                }
            })
            ->addColumn('actions', function ($role) {
                return $role['role']->action_buttons;
            })
            ->make(true);
    }

    public function getDeletedRolesForDataTable($deletedRoles)
    {
        return Datatables::of($deletedRoles)
            ->escapeColumns([])
            ->addColumn('name', function ($role) {
                if ($role->name) {
                    return $role->name;
                }
            })
            ->addColumn('description', function ($role) {
                if ($role->description) {
                    return $role->description;
                }
            })
            ->addColumn('level', function ($role) {
                return $role->level;
            })
            ->addColumn('permissions', function ($role) {
                $permissions = '';
                if ($role['permissions']->count() > 0) {
                    foreach($role['permissions'] as $permission ){
                        $permissions .= '<span class="badge bg-success">'.$permission->name.'</span>';
                    }
                }else {
                    $permissions = 'None';
                }
                return $permissions;
            })
            ->addColumn('created_at', function ($role) {
                if ($role->created_at) {
                    return $role->created_at->format('j F Y h:i');
                }
            })
            ->addColumn('updated_at', function ($role) {
                if ($role->updated_at) {
                    return $role->updated_at->format('j F Y h:i');
                }
            })
            ->addColumn('actions', function ($role) {
                return $role->deleted_buttons;
            })
            ->make(true);
    }

    public function storeRole(array $request)
    {
        $slug = Str::slug($request['slug'], '-');
        $permissionFound = Role::where('slug', $slug)->get()->count();
        if ($permissionFound) {
            return false;
        }

        $role = new Role();
        $role->name = $request['name'];
        $role->slug = $slug;
        if($role->save()){
            $role->permissions()->sync($request['permissions']);
            return true;
        }
    }

    public function updateRole($request, $id)
    {
        $slug = Str::slug($request['slug'], '-');
        $permissionFound = Role::where('slug', $slug)->where('id','!=', $id)->get()->count();
        if ($permissionFound) {
            return false;
        }

        $role = Role::findOrFail($request['id']);
        $role->name = $request['name'];
        $role->slug = $slug;
        if($role->save()){
//            $role->permissions()->sync([]);
            $role->permissions()->sync($request['permissions']);
            return true;
        }
    }
}
