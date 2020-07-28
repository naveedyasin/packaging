<?php


namespace App\Services;


use App\Models\Admin\Admin;
use App\Models\Permission\Permission;
use App\Models\Role\Role;
use App\Traits\RolesAndPermissionsHelpersTrait;
use Illuminate\Support\Arr;

class UserFormFields
{
    use RolesAndPermissionsHelpersTrait;

    /**
     * List of fields and default value for each field.
     *
     * @var array
     */
    protected $fieldList = [
        'first_name' => '',
        'last_name' =>  '',
        'email'  => '',
        'is_active' => '1',
        'userRoles' => [],
        'userPermissions' => [],
    ];
    /**
     * @var int|null
     */
    private $id;

    /**
     * Create a new job instance.
     *
     * @param int $id
     *
     * @return void
     */
    public function __construct($id = null)
    {
        $this->id = $id;
    }
    /**
     * Execute the job.
     *
     * @return array
     */
    public function handle()
    {
        $fields = $this->fieldList;
        if ($this->id) {
            $fields = $this->fieldsFromModel($this->id, $fields);
        }
        foreach ($fields as $fieldName => $fieldValue) {
            $fields[$fieldName] = old($fieldName, $fieldValue);
        }
        // Get the additional data for the form fields
        $roles = $this->getAllRoles();
        $permissions = $this->getAllPermissions();
        return array_merge(
            $fields,
            $roles,
            $permissions
        );
//        return $fields;
    }
    /**
     * Return the field values from the model.
     *
     * @param int   $id
     * @param array $fields
     *
     * @return array
     */
    protected function fieldsFromModel($id, array $fields)
    {
        $user = Admin::findOrFail($id);
        $userRoles = $user->roles->pluck('id')->all();
        $userPermissions = $user->adminPermissions->pluck('id')->all();
        $fieldNames = array_keys(Arr::except($fields, ['roles', 'permissions', 'userRoles', 'userPermissions']));
        $fields = [
            'id' => $id,
            'userRoles' => $userRoles,
            'userPermissions' => $userPermissions,
        ];
        foreach ($fieldNames as $field) {
            $fields[$field] = $user->{$field};
        }
        return $fields;
    }
    /**
     * Get the additonal form fields data.
     *
     * @return array
     */
    protected function getAllRoles()
    {
        return [
            'roles' => Role::latest()->get(),
        ];
    }

    protected function getAllPermissions()
    {
        return [
            'permissions' => Permission::latest()->get(),
        ];
    }
}
