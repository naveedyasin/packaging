<?php


namespace App\Services;



use App\Models\Email\Email;
use Illuminate\Support\Arr;

class EmailFormFields
{

    /**
     * List of fields and default value for each field.
     *
     * @var array
     */
    protected $fieldList = [
        'purpose' => '',
        'subject'  => '',
        'from_name' => '',
        'from_email' => '',
        'to_email' => '',
        'cc_email' => '',
        'bcc_email' => '',
        'reply_to_email' => '',
        'contents' => '',
        'is_promotional' => '1',
        'email_type' => 'common',
        'active' => '1',
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
        $user = Email::findOrFail($id);
        $fieldNames = array_keys(Arr::except($fields, ['email_reference']));
        $fields = [
            'id' => $id,
        ];
        foreach ($fieldNames as $field) {
            $fields[$field] = $user->{$field};
        }
        return $fields;
    }
}
