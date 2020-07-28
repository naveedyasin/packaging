<?php


namespace App\Services;



use App\Models\Module\Module;
use App\Models\Module\SubModule;
use Illuminate\Support\Arr;

class SubModuleFormFields
{

    /**
     * List of fields and default value for each field.
     *
     * @var array
     */
    protected $fieldList = [
        'name' => '',
        'module_id' => '',
        'modules'  => [],
        'route'  => '',
        'position' => '',
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
        $moduleFormFieldData = $this->moduleFormFieldData();
        return array_merge(
            $fields,
            $moduleFormFieldData
        );
        // Get the additional data for the form fields
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
        $subModule = SubModule::findOrFail($id);
        $modules = Module::where('is_active', 1)->pluck('id');
        $fieldNames = array_keys(Arr::except($fields, ['modules']));
        $fields = [
            'id' => $id,
            'modules' => $modules,
        ];
        foreach ($fieldNames as $field) {
            $fields[$field] = $subModule->{$field};
        }
        return $fields;
    }

    private function moduleFormFieldData()
    {
        $module = Module::where('is_active', 1)->get();
        return [
            'modules' => $module,
        ];
    }
}
