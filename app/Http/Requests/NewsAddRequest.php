<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NewsAddRequest extends FormRequest
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
            'title' => 'required|unique:news,title',
            'image' => 'required',
            'description' => 'required',
            'content' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'Tiêu đề trống',
            'image.required' => 'Ảnh trống',
            'description.required' => 'Mô tả trống',
            'content.required' => 'Nội dung trống',
            'title.unique' => 'Trùng tên tiêu đề'
        ];
    }
}
