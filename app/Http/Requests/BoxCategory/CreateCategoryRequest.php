<?php

namespace App\Http\Requests\BoxCategory;

// use App\Events\Backend\Category\CategoryCreatedEvent;
use App\Models\Box\BoxCategory;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Str;

class CreateCategoryRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return hasPermissions('admin.boxcategory.create');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name'    =>  'required|min:2|max:100',
            'slug'    =>  'required|unique:box_categories,slug',
        ];
    }

    public function categoryFillData()
    {
        $category = new BoxCategory();
        $category->name = $this->name;
        $category->parent_id = $this->parent_id ? $this->parent_id : 0;
        $category->slug = Str::slug($this->slug);
        $category->description = $this->description;
        $category->status = $this->has('status') ? true : false;

        if($category = $category->save()){
            // event(new CategoryCreatedEvent($category));
            return true;
        }
        return false;
    }
}
