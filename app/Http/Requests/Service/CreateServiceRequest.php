<?php

namespace App\Http\Requests\Service;

use App\Models\Service\Service;
use Illuminate\Foundation\Http\FormRequest;
use UploadImage;
class CreateServiceRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return hasPermissions('admin.service.create');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name'        =>  'required|min:2|max:250|unique:services,name',
            'contents'    =>  'required',
        ];
    }

    public function serviceFillData()
    {
        $service = new Service();
        $service->name = $this->name;
        $service->contents = $this->contents;
        $service->excerpt = $this->excerpt;
        $service->active = $this->has('active') ? true : false;
        $service->display_on_home = $this->has('display_on_home') ? true : false;

        if($service->save()){
            if($this->has('image')){
                $imageName = UploadImage::upload($this->file('image'), 'services/', '', 0, 0, false);
                $service->update([
                    'image' => $imageName,
                ]);
            }
            return $service;
        }
        return false;
    }
}
