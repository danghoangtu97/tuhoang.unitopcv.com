<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class storeUserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'email' => 'required|unique:users',
            'name' => 'required',
            'password' => 'required',
            're-password' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'email.required' => 'Email không được để trống',
            'email.unique' => 'Email đã tồn tại',
            'name.required' => 'Tên không được để trống',
            'password.required' => 'Password không được để trống',
            're-password.required' => 'Lập lại password không được để trống',
        ];
    }
}
