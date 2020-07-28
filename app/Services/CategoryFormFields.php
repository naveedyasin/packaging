<?php


namespace App\Services;


use App\Models\Blog\Category;

class CategoryFormFields
{

    /**
     * List of fields and default value for each field.
     *
     * @var array
     */
    protected $fieldList = [
        'name' => '',
        'slug' =>  '',
        'parent_id' =>  [],
        'description'  => '',
        'status' => '1',
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
        $categoryFormFieldData = $this->categoryFormFieldData($this->id);
        return array_merge(
            $fields,
            $categoryFormFieldData
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
        $category = Category::findOrFail($id);
        $fieldNames = array_keys($fields);
        $fields = [
            'id' => $id,
        ];
        foreach ($fieldNames as $field) {
            $fields[$field] = $category->{$field};
        }
        return $fields;
    }

    protected function categoryFormFieldData($id = null)
    {
        $category = Category::active(1);
        if($id){
            $category->where('id','!=', $id);
        }
        return [
            'categories' => $category->get(),
        ];
    }
}
