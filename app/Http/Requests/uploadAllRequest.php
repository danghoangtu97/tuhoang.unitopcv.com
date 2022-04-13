<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class uploadAllRequest extends FormRequest
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
            'name' => 'required',
            'value' => 'required',
            'password' => 'required',

        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Tên không được để trống',
            'value.required' => 'Không được để trống',
            'password.required' => 'Không được để trống',

        ];
    }
}
