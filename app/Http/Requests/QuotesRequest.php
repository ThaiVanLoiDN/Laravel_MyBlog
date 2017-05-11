<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class QuotesRequest extends FormRequest
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
            'author' => 'required|min:10|max:100',
            'content' => 'required|min:10|max:100000',
            'image' => 'mimes:jpg,jpeg,bmp,png|max:3072',
        ];
    }

    public function messages()
    {
        return [
            'author.required' => 'Vui lòng nhập tên tác giả',
            'author.min' => 'Vui lòng nhập tên tác giả tối thiểu 10 ký tự',
            'author.max' => 'Vui lòng nhập tên tác giả tối đa 100 ký tự',

            'content.required' => 'Vui lòng nhập nội dung',
            'content.min' => 'Vui lòng nhập nội dung tối thiểu 10 ký tự',
            'content.max' => 'Vui lòng nhập nội dung tối đa 100000 ký tự',

            'image.max' => 'Kích thước ảnh tối đa 3MB',
            'image.mimes' => 'Vui lòng chọn ảnh đuôi jpg, jpeg, bmp, png'  
        ];
    }
}
