<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class InfoRequest extends FormRequest
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
            'value' => 'required|min:10|max:100',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Vui lòng nhập tên mạng xã hội',
            'name.min' => 'Vui lòng nhập tên mạng xã hội tối thiểu 5 ký tự',
            'name.max' => 'Vui lòng nhập tên mạng xã hội tối đa 100 ký tự',

            'value.required' => 'Vui lòng nhập link',
            'value.min' => 'Vui lòng nhập link tối thiểu 10 ký tự',
            'value.max' => 'Vui lòng nhập link tối đa 100 ký tự',

             
        ];
    }
}
