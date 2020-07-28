<?php

namespace App\Http\Requests\Permission;

use Illuminate\Foundation\Http\FormRequest;

class CreatePermissionRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return hasPermissions('admin.permission.create');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $permissionId = $this->route()->parameter('permission');
        return [
            'name'          => 'required|max:60|unique:'.config('roles.permissionsTable').',name,'.$permissionId.',id',
            'slug'          => 'required|max:60|unique:'.config('roles.permissionsTable').',slug,'.$permissionId.',id',
            'description'   => 'nullable|string|max:255',
            'model'         => 'required|string|max:60',
        ];
    }

    /**
     * Return the fields and values to create a new role.
     *
     * @return array
     */
    public function permissionFillData()
    {
        return [
            'name'          => $this->name,
            'slug'          => $this->slug,
            'description'   => $this->description,
            'model'         => $this->model,
        ];
    }
}
