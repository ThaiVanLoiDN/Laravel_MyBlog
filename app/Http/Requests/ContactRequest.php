<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactRequest extends FormRequest
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
            'fullname' => 'required|min:10|max:100',
            'email' => 'required|min:10|max:100|email',
            'phone' => 'required|min:9|max:20',
            'message' => 'required|min:10|max:10000',
        ];
    }

    public function messages()
    {
        return [
            'fullname.required' => 'Vui lòng nhập tên đầy đủ',
            'fullname.min' => 'Vui lòng nhập tên đầy đủ tối thiểu 10 ký tự',
            'fullname.max' => 'Vui lòng nhập tên đầy đủ tối đa 100 ký tự',

            'email.required' => 'Vui lòng nhập email',
            'email.min' => 'Vui lòng nhập email tối thiểu 10 ký tự',
            'email.max' => 'Vui lòng nhập email tối đa 100 ký tự',
            'email.email' => 'Vui lòng nhập email đúng định dạng',

            'phone.required' => 'Vui lòng nhập số điện thoại',
            'phone.min' => 'Vui lòng nhập số điện thoại tối thiểu 9 ký tự',
            'phone.max' => 'Vui lòng nhập số điện thoại tối đa 20 ký tự',

            'message.required' => 'Vui lòng nhập nội dung tin nhắn',
            'message.min' => 'Vui lòng nhập nội dung tin nhắn tối thiểu 10 ký tự',
            'message.max' => 'Vui lòng nhập nội dung tin nhắn tối đa 10000 ký tự',
        ];
    }
}
