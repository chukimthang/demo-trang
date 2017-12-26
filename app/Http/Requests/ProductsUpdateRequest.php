<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductsUpdateRequest extends FormRequest
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
            'description' => 'required',
            'unit_price' => 'required|numeric',
            'discount' => 'required|numeric',
            'unit' => 'required',
            'quantity' => 'required|numeric',
            'type_product_id' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'description.required' => 'Vui lòng nhập mô tả sản phẩm',
            'unit_price.required' => 'Vui lòng nhập giá sản phẩm',
            'unit_price.numeric' => 'Giá phải là chữ số',
            'discount.required' => 'Vui lòng nhập giá trị khuyến mại',
            'discount.numeric' => 'Giá trị khuyến mại phải là chữ số',
            'unit.required' => 'Vui lòng chọn đơn vị',
            'quantity.required' => 'Vui lòng nhập số lượng',
            'quantity.numeric' => 'Số lượng phải là chữ số',
            'type_product_id.required' => 'Vui lòng chọn loại sản phẩm'
        ];
    }
}
