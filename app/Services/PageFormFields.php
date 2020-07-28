<?php


namespace App\Services;



use App\Models\Page\Page;

class PageFormFields
{

    /**
     * List of fields and default value for each field.
     *
     * @var array
     */
    protected $fieldList = [
        'title' => '',
        'slug' =>  '',
        'contents'  => '',
        'status' => '1',
        'crawlable' => '1',
        'meta_title' => '',
        'meta_keywords' => '',
        'meta_description' => '',
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
        $user = Page::findOrFail($id);
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
