<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class Grades_Store extends FormRequest
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
            'Name' => 'required',
            'Name_en' => 'required',


            //
        ];
    }

    public function messages()
{
    return [
        'Name.required' => trans('validation.required'),
        'Name_en.required' => trans('validation.required'),
    ];
}
}
