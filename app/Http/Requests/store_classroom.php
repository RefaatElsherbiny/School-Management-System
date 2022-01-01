<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class store_classroom extends FormRequest
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
            //

            "List_Classes.*.name_class" => "required",
            'List_Classes.*.name_class_en' => "required"
        ];
    }

    public function messege()
    {
        return [
        'name_class.required' => trans('class_room.validtion'),
        'name_class_en.required' => trans('class_room.validtion'),


        ];

    }
}
