<?php


namespace App\Services;


use App\Models\Blog\Category;
use App\Models\Service\Service;
use Illuminate\Support\Arr;

class ServiceFormFields
{

    /**
     * List of fields and default value for each field.
     *
     * @var array
     */
    protected $fieldList = [
        'name' => '',
        'contents'  => '',
        'excerpt'  => '',
        'image' => '',
        'active' => '1',
        'display_on_home' => '1',
        'categories' => [],
        'serviceCategories' => [],
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
        $service = Service::findOrFail($id);
        $serviceCategories = Service::where('active', 1)->pluck('id')->toArray();
        $fieldNames = array_keys(Arr::except($fields, ['categories','serviceCategories']));
        $fields = [
            'id' => $id,
            'serviceCategories' => $serviceCategories,
        ];
        foreach ($fieldNames as $field) {
            $fields[$field] = $service->{$field};
        }
        return $fields;
    }

    protected function categoryFormFieldData($id = null)
    {
        $category = Category::active(1);
//        if($id){
//            $category->where('id','!=', $id);
//        }
        return [
            'categories' => $category->get(),
        ];
    }
}
