<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostRequest extends FormRequest
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
            'title' => 'required|min:10|max:100',
            'category_id' => 'required|numeric|integer',
            'description' => 'required|min:10|max:100000',
            'content' => 'required|min:10|max:100000',
            'image' => 'mimes:jpg,jpeg,bmp,png|max:3072',
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'Vui lòng nhập tên bài viết',
            'title.min' => 'Vui lòng nhập tên bài viết tối thiểu 10 ký tự',
            'title.max' => 'Vui lòng nhập tên bài viết tối đa 100 ký tự',

            'category_id.required' => 'Vui lòng chọn chuyên mục',
            'category_id.numeric' => 'Vui lòng chọn chuyên mục giá trị số',
            'category_id.integer' => 'Vui lòng chọn chuyên mục giá trị số',

            'description.required' => 'Vui lòng nhập mô tả',
            'description.min' => 'Vui lòng nhập mô tả tối thiểu 10 ký tự',
            'description.max' => 'Vui lòng nhập mô tả tối đa 100000 ký tự',

            'content.required' => 'Vui lòng nhập nội dung',
            'content.min' => 'Vui lòng nhập nội dung tối thiểu 10 ký tự',
            'content.max' => 'Vui lòng nhập nội dung tối đa 100000 ký tự',

            'image.max' => 'Kích thước ảnh tối đa 3MB',
            'image.mimes' => 'Vui lòng chọn ảnh đuôi jpg, jpeg, bmp, png'  
        ];
    }
}
