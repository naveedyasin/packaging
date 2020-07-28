<?php


namespace App\Services;


use App\Models\Module\Module;

class ModuleFormFields
{

    /**
     * List of fields and default value for each field.
     *
     * @var array
     */
    protected $fieldList = [
        'name' => '',
        'route_name'  => '',
        'position' => '',
        'icon' => '',
        'is_active' => '1',
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
        return $fields;
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
        $user = Module::findOrFail($id);
        $fieldNames = array_keys($fields);
        $fields = [
            'id' => $id,
        ];
        foreach ($fieldNames as $field) {
            $fields[$field] = $user->{$field};
        }
        return $fields;
    }
}
