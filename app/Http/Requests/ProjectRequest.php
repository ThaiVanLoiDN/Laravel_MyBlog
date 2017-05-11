<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProjectRequest extends FormRequest
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
            'name' => 'required|max:100',
            'link' => 'required|max:100',
            'time' => 'required|min:10|max:100',
            'description' => 'required|min:10|max:100000',
            'image' => 'mimes:jpg,jpeg,bmp,png|max:3072',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Vui lòng nhập tên dự án',
            'name.max' => 'Vui lòng nhập tên dự án tối đa 100 ký tự',

            'link.required' => 'Vui lòng nhập link dự án',
            'link.max' => 'Vui lòng nhập link dự án tối đa 100 ký tự',

            'time.required' => 'Vui lòng nhập thời gian',
            'time.min' => 'Vui lòng nhập thời gian tối thiểu 10 ký tự',
            'time.max' => 'Vui lòng nhập thời gian tối đa 100 ký tự',

            'description.required' => 'Vui lòng nhập mô tả',
            'description.min' => 'Vui lòng nhập mô tả tối thiểu 10 ký tự',
            'description.max' => 'Vui lòng nhập mô tả tối đa 100000 ký tự',

            'image.max' => 'Kích thước ảnh tối đa 3MB',
            'image.mimes' => 'Vui lòng chọn ảnh đuôi jpg, jpeg, bmp, png'  
        ];
    }
}
