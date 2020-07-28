<?php

namespace App\Http\Requests\Post;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePostRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return hasPermissions('admin.post.edit');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $postId = $this->route()->parameter('post');
        return [
            'title' => "required|unique:posts,title,{$postId}|min:2|max:250",
            'body' => 'required',
            'file' => 'sometimes|image|mimes:jpeg,png,jpg,gif|max:2048',
        ];
    }
}
