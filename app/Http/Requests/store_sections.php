<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class store_sections extends FormRequest
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

            'name_section_ar' => 'required',
            'name_section_en' => 'required',
            'Grade_id' => 'required',
            'Class_id' => 'required',

        ];
    }

    public function messege()
    {
        return [
            'name_section_ar.required' => trans('Sections_trans.required_ar'),
            'name_section_en.required' => trans('Sections_trans.required_en'),
            'Grade_id.required' => trans('Sections_trans.Grade_id_required'),
            'Class_id.required' => trans('Sections_trans.Grade_id_required'),
            'teachers_id.required' => trans('Sections_trans.Grade_id_required'),
            'sections_id.required' => trans('Sections_trans.Grade_id_required'),






        ];

    }
}
