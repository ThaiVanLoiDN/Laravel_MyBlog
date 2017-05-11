<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
            'username' => 'required|min:3|max:100',
            'fullname' => 'required|min:3|max:100',
            'email' => 'required|min:10|max:100|email',
            'role' => 'required|numeric|integer|between:1,3',
            'password' => 'required|min:6|max:100',
            'image' => 'mimes:jpg,jpeg,bmp,png|max:3072',
        ];
    }

    public function messages()
    {
        return [
            'username.required' => 'Vui lòng nhập tên đăng nhập',
            'username.min' => 'Vui lòng nhập tên đăng nhập tối thiểu 3 ký tự',
            'username.max' => 'Vui lòng nhập tên đăng nhập tối đa 100 ký tự',

            'fullname.required' => 'Vui lòng nhập tên đầy đủ',
            'fullname.min' => 'Vui lòng nhập tên đầy đủ tối thiểu 3 ký tự',
            'fullname.max' => 'Vui lòng nhập tên đầy đủ tối đa 100 ký tự',

            'email.required' => 'Vui lòng nhập email',
            'email.min' => 'Vui lòng nhập email tối thiểu 10 ký tự',
            'email.max' => 'Vui lòng nhập email tối đa 100 ký tự',
            'email.email' => 'Vui lòng nhập email đúng định dạng',

            'role.required' => 'Vui lòng chọn quyền',
            'role.numeric' => 'Vui lòng chọn quyền giá trị số',
            'role.integer' => 'Vui lòng chọn quyền giá trị số',
            'role.between' => 'Vui lòng chọn quyền giá trị số từ 1 đến 3',

            'password.required' => 'Vui lòng nhập mật khẩu',
            'password.min' => 'Vui lòng nhập mật khẩu tối thiểu 6 ký tự',
            'password.max' => 'Vui lòng nhập mật khẩu tối đa 100 ký tự',

            'image.max' => 'Kích thước ảnh tối đa 3MB',
            'image.mimes' => 'Vui lòng chọn ảnh đuôi jpg, jpeg, bmp, png'  
        ];
    }
}
