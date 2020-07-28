<?php


namespace App\Repository\Backend\User;


use App\Exceptions\GeneralException;
use App\Models\Admin\Admin;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Yajra\DataTables\Facades\DataTables;
class UserRepository
{
    public function getForDataTable()
    {
        return Datatables::of(Admin::orderBy('created_at', 'desc')->get())
            ->escapeColumns(['first_name','last_name', 'email'])
            ->addColumn('status', function($user) {
                return $user->is_active ? '<span class="badge badge-success">Active</span>' : '<span class="badge badge-secondary">Inactive</span>';
            })
            ->addColumn('roles', function($user) {
                $roles = '';
                foreach($user->roles as $role){
                    $roles .= ' <span class="badge badge-success">'.$role->name.'</span>';
                }
                return $roles;
            })
            ->addColumn('created_at', function ($user) {
                if ($user->created_at) {
                    return $user->created_at->format('j M Y h:i');
//                    return '<span class="label label-success">'.trans('labels.general.all').'</span>';
                }
            })
            ->addColumn('actions', function ($user) {
                return $user->action_buttons;
            })
            ->make(true);
    }

    public function createUser($request, $data)
    {
        if($user = Admin::create($data)){
            if($request->has('roles')){
                $user->syncRoles($request->roles);
            }
            if($request->has('permissions')){
                $user->syncPermissions($request->permissions);
            }
            return true;
        }
        return false;
    }

    public function updateUser($request, $id, $data)
    {

        $user = Admin::findOrFail($id);
        if($user->update($data)){
            if($request->has('roles')){
                $user->syncRoles($request->roles);
            }else {
                $user->syncRoles([]);
            }
            if($request->has('permissions')){
                $user->syncPermissions($request->permissions);
            }else {
                $user->syncPermissions([]);
            }
            return true;
        }
    }

    public function updatePassword(Admin $admin, array $request)
    {
        if (Hash::check($request['old_password'], $admin->password)) {
            $admin->password = Hash::make($request['password']);
            if ($admin->save()) {
//                event(new UserPasswordChanged($admin));
                return true;
            }
            throw new GeneralException('There was a problem changing this users password. Please try again.');
        }

        throw new GeneralException('That is not your old password.');
    }

    public function updateProfile(Admin $admin, array $request)
    {
        $admin->first_name = $request['first_name'];
        $admin->last_name = $request['last_name'];
        if ($admin->save()) {
//                event(new UserProfileChanged($admin));
            return true;
        }
        throw new GeneralException('There was a problem updating the profiles. Please try again.');
    }
}
