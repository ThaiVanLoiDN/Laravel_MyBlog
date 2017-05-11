<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AdsRequest extends FormRequest
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
            'name' => 'required|min:5|max:100',
            'link' => 'required|min:10|max:100',
            
            'image' => 'mimes:jpg,jpeg,bmp,png|max:3072',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Vui lòng nhập tên',
            'name.min' => 'Vui lòng nhập tên tối thiểu 5 ký tự',
            'name.max' => 'Vui lòng nhập tên tối đa 100 ký tự',

            'link.required' => 'Vui lòng nhập link',
            'link.min' => 'Vui lòng nhập link tối thiểu 10 ký tự',
            'link.max' => 'Vui lòng nhập link tối đa 100 ký tự',

            'image.max' => 'Kích thước ảnh tối đa 3MB',
            'image.mimes' => 'Vui lòng chọn ảnh đuôi jpg, jpeg, bmp, png'  
        ];
    }
}
