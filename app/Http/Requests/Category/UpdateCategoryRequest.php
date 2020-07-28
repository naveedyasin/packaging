<?php

namespace App\Http\Requests\Category;

use App\Events\Backend\Category\CategoryUpdatedEvent;
use App\Models\Blog\Category;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Str;

class UpdateCategoryRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return hasPermissions('admin.category.edit');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $categoryId = $this->route()->parameter('category');
        return [
            'name'    =>  'required|min:2|max:100',
            'slug'    =>  "required|unique:categories,slug,{$categoryId}",
        ];
    }

    public function categoryFillData($id)
    {
        $category = Category::findOrFail($id);
        $category->name = $this->name;
        $category->parent_id = $this->parent_id ? $this->parent_id : 0;
        $category->slug = Str::slug($this->slug);
        $category->description = $this->description;
        $category->status = $this->has('status') ? true : false;

        if($category = $category->save()){
            event(new CategoryUpdatedEvent($category));
            return true;
        }
        return false;
    }
}
