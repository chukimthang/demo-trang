<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TypeProductsAddRequest extends FormRequest
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
            'name'=>'required|unique:type_products,name|min:2|max:100'
        ];
    }

    public function messages()
    {
        return [
            'name.required'=>'Vui lòng nhập tên loại sản phẩm.',
            'name.unique' => 'Tên loại sản phẩm đã tồn tại.',
            'name.min'=>'Tên ít nhất 2 kí tự.',
            'name.max'=>'Tên không quá 100 kí tự.'
        ];
    }
}
