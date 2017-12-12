<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ReceiverInfoRequest extends FormRequest
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
            'phone' => 'required|numeric',
            'address_receive' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'phone.required' => 'Số điện thoại trống',
            'phone.numeric' => 'Số điện thoại phải là số nguyên',
            'address_receive.required' => 'Địa chỉ nhận trống'
        ];
    }
}
