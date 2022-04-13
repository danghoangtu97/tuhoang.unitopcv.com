<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class cartRequest extends FormRequest
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
            'fullName' => 'required',
            'address' => 'required',
            'phone_number' => 'required',
            'payment-method' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'fullName.required' => 'Họ và tên không được để trống',
            'address.required' => 'Địa chỉ không được để trống',
            'phone_number.required' => 'Số điện thoại không được để trống',
            'payment-method.required' => 'Phương thức thanh toán không được để trống',
        ];
    }
}
