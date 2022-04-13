<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class storePostRequest extends FormRequest
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
            'name' => 'required|unique:posts',
            'description' => 'required',
            'category' => 'required',
            'content' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Tên bài viết không được để trống',
            'name.unique' => 'Tên bài viết đã tồn tại',
            'description.required' => 'Không được để trống',
            'category.required' => 'Không được để trống',
            'content.required' => 'Không được để trống',
        ];
    }
}
