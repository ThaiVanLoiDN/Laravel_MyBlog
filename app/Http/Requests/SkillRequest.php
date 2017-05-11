<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SkillRequest extends FormRequest
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
            'name' => 'required|min:10|max:100',
            'percent' => 'required|numeric|integer|between:1,100',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Vui lòng nhập tên skill',
            'name.min' => 'Vui lòng nhập tên skill tối thiểu 10 ký tự',
            'name.max' => 'Vui lòng nhập tên skill tối đa 100 ký tự',

            'percent.required' => 'Vui lòng nhập phần trăm',
            'percent.numeric' => 'Vui lòng nhập phần trăm giá trị số',
            'percent.integer' => 'Vui lòng nhập phần trăm giá trị số',
            'percent.between' => 'Vui lòng nhập phần trăm giá trị số từ 1 đến 100',
        ];
    }
}
