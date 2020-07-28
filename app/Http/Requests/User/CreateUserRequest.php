<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class CreateUserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return hasPermissions('admin.user.create');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $userId = $this->route()->parameter('user');
        return [
            'first_name' => 'required|min:2|max:50',
            'last_name' => 'required|min:2|max:50',
            'email' => "sometimes|required|min:2|max:50|unique:admins,email,{$userId}",
            'password' => is_null($userId) ? 'required|min:4|max:50' : '',
        ];
    }

    public function userFillData($id = null)
    {
        $userData = [
            'first_name'          => $this->first_name,
            'last_name'          => $this->last_name,
            'is_active'         => $this->is_active,
        ];
        if(is_null($id)){
            $userData['email'] = $this->email;
            $userData['password'] = Hash::make($this->password);
            $userData['created_by'] = Auth::user()->id;
        }else {
            $userData['updated_by'] = Auth::user()->id;
            if($this->filled('password')){
                $userData['password'] = Hash::make($this->password);
            }
        }
        return $userData;
    }
}
