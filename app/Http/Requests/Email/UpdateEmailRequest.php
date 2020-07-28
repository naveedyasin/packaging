<?php

namespace App\Http\Requests\Email;

use Illuminate\Foundation\Http\FormRequest;

class UpdateEmailRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return hasPermissions('admin.email.edit');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'purpose' => 'required|min:2|max:250',
            'subject' => 'required|min:2|max:250',
            'from_name' => 'required|min:2|max:50',
            'from_email' => "required|email|max:50",
            'contents' => "required",
        ];
    }
}
