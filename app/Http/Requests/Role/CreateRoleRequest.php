<?php

namespace App\Http\Requests\Role;

use Illuminate\Foundation\Http\FormRequest;

class CreateRoleRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return hasPermissions('admin.role.create');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $roleId = $this->route()->parameter('role');
        return [
            'name'          => 'required|unique:'.config('roles.rolesTable').',name,'.$roleId.',id',
            'slug'          => 'required|unique:'.config('roles.rolesTable').',slug,'.$roleId.',id',
            'description'   => 'nullable|string|max:255',
            'level'         => 'required|integer',
        ];
    }

    /**
     * Return the fields and values to create a new role.
     *
     * @return array
     */
    public function roleFillData()
    {
        return [
            'name'          => $this->name,
            'slug'          => $this->slug,
            'description'   => $this->description,
            'level'         => $this->level,
        ];
    }
}
