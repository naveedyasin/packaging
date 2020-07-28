<?php


namespace App\Models;


trait ModelTrait
{
    /**
     * @return string
     */
    public function getEditButtonAttribute($permission, $route)
    {
        if (hasPermissions($permission)) {
            return '<a href="'.route($route, $this).'" class="list-icons-item">
                    <i class="icon-pencil7"></i>
                </a>';
        }
    }

    public function getViewButtonAttribute($permission, $route)
    {
//        if (access()->allow($permission)) {
        return '<a href="'.route($route, $this).'" class="list-icons-item">
                    <i class="icon-eye"></i>
                </a>';
//        }
    }

    /**
     * @return string
     */
    public function getDeleteButtonAttribute($permission, $route)
    {
        if (hasPermissions($permission)) {
            return '<a href="'.route($route, $this).'"
                    class="list-icons-item" data-method="delete"
                    data-trans-button-cancel="'.trans('buttons.general.cancel').'"
                    data-trans-button-confirm="'.trans('buttons.general.crud.delete').'"
                    data-trans-title="'.trans('strings.backend.general.are_you_sure').'">
                       <i class="icon-trash"></i>
                </a>';
        }
    }

    public function getSettingsButtonAttribute($permission, $route)
    {
        return '<div class="dropdown">
			<a href="table_elements.html#" class="list-icons-item dropdown-toggle" data-toggle="dropdown">
			<i class="icon-cog6"></i></a>
			<div class="dropdown-menu">
                    <a href="'.route($route, $this).'" class="dropdown-item"><i class="icon-pencil7"></i>Permissions</a>
                </div>
            </div>';
    }

    public function getDeletedPermissionAttribute($permission, $route)
    {
        return '<div class="dropdown">
            <a href="datatable_basic.html#" class="list-icons-item" data-toggle="dropdown">
                <i class="icon-menu9"></i>
            </a>

            <div class="dropdown-menu dropdown-menu-right">
            <a href="'.route('admin.permission-show-deleted', $this).'" class="dropdown-item"><i class="icon-eye"></i>View Permissions</a>
            <a href="'.route('admin.permission-restore', $this).'"
                    class="dropdown-item" data-method="put"
                    data-trans-button-cancel="'.trans('buttons.general.cancel').'"
                    data-trans-button-confirm="'.trans('buttons.general.crud.delete').'"
                    data-trans-title="'.trans('strings.backend.general.are_you_sure').'">
                       <i class="icon-reload-alt"></i>Restore Permission
                </a>
                <a href="'.route('admin.permission-item-destroy', $this).'"
                    class="dropdown-item" data-method="delete"
                    data-trans-button-cancel="'.trans('buttons.general.cancel').'"
                    data-trans-button-confirm="'.trans('buttons.general.crud.delete').'"
                    data-trans-title="'.trans('strings.backend.general.are_you_sure').'">
                       <i class="icon-trash"></i>Destroy Permission
                </a>
                <a href="'.route('admin.permissions-deleted-restore-all', $this).'"
                    class="dropdown-item" data-method="post"
                    data-trans-button-cancel="'.trans('buttons.general.cancel').'"
                    data-trans-button-confirm="'.trans('buttons.general.crud.delete').'"
                    data-trans-title="'.trans('strings.backend.general.are_you_sure').'">
                       <i class="icon-reload-alt"></i>Restore All
                </a>
                <a href="'.route('admin.destroy-all-deleted-permissions', $this).'"
                    class="dropdown-item" data-method="delete"
                    data-trans-button-cancel="'.trans('buttons.general.cancel').'"
                    data-trans-button-confirm="'.trans('buttons.general.crud.delete').'"
                    data-trans-title="'.trans('strings.backend.general.are_you_sure').'">
                       <i class="icon-trash"></i>Destroy All
                </a>
            </div>
        </div>';
    }

    public function getDeletedRoleAttribute($permission, $route)
    {
        return '<div class="dropdown">
            <a href="datatable_basic.html#" class="list-icons-item" data-toggle="dropdown">
                <i class="icon-menu9"></i>
            </a>

            <div class="dropdown-menu dropdown-menu-right">
            <a href="'.route('admin.role-show-deleted', $this).'" class="dropdown-item"><i class="icon-eye"></i>View Roles</a>
            <a href="'.route('admin.role-restore', $this).'"
                    class="dropdown-item" data-method="put"
                    data-trans-button-cancel="'.trans('buttons.general.cancel').'"
                    data-trans-button-confirm="'.trans('buttons.general.crud.delete').'"
                    data-trans-title="'.trans('strings.backend.general.are_you_sure').'">
                       <i class="icon-reload-alt"></i>Restore Role
                </a>
                <a href="'.route('admin.role-item-destroy', $this).'"
                    class="dropdown-item" data-method="delete"
                    data-trans-button-cancel="'.trans('buttons.general.cancel').'"
                    data-trans-button-confirm="'.trans('buttons.general.crud.delete').'"
                    data-trans-title="'.trans('strings.backend.general.are_you_sure').'">
                       <i class="icon-trash"></i>Destroy Role
                </a>
                <a href="'.route('admin.roles-deleted-restore-all', $this).'"
                    class="dropdown-item" data-method="post"
                    data-trans-button-cancel="'.trans('buttons.general.cancel').'"
                    data-trans-button-confirm="'.trans('buttons.general.crud.delete').'"
                    data-trans-title="'.trans('strings.backend.general.are_you_sure').'">
                       <i class="icon-reload-alt"></i>Restore All
                </a>
                <a href="'.route('admin.destroy-all-deleted-roles', $this).'"
                    class="dropdown-item" data-method="delete"
                    data-trans-button-cancel="'.trans('buttons.general.cancel').'"
                    data-trans-button-confirm="'.trans('buttons.general.crud.delete').'"
                    data-trans-title="'.trans('strings.backend.general.are_you_sure').'">
                       <i class="icon-trash"></i>Destroy All
                </a>
            </div>
        </div>';
    }
}
