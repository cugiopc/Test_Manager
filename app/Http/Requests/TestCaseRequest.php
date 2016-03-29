<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class TestCaseRequest extends Request
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
            'title' => 'required|max:255',
            'steps' => 'required'
        ];
    }

    public function messages() {
        return [
            'title.required' =>'Tiêu đề Testcase không được rỗng !',
            'title.max' =>'Tiêu đề quá số lượng ký tự cho phép.',
            'steps.required' =>'Các bước của Test Case không được rỗng !'
        ];
    }
}
