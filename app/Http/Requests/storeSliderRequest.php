<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class storeSliderRequest extends FormRequest
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
            'name' => 'required|unique:sliders',
            'description' => 'required',
            'image_path' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Tên slider không được để trống',
            'name.unique' => 'Tên slider đã tồn tại',
            'description.required' => 'Mô tả slider không được để trống',
            'image_path.required' => 'Ảnh slider không được để trống',
        ];
    }
}
