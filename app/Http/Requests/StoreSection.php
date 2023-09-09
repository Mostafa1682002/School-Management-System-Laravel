<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreSection extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'section_name_ar' => "required|regex:/^[\p{Arabic} ]+/u",
            "section_name_en" => "required|regex:/^[a-zA-Z ]+/",
            "school_grade_id" => "required",
            "class_id" => "required",
            "teacher_id" => "required",
        ];
    }
    public function attributes(): array
    {
        return [
            'section_name_ar' => trans('Sections_trans.section_name_ar'),
            'section_name_en' => trans('Sections_trans.section_name_en'),
            'school_grade_id' => trans('Sections_trans.name_grade'),
            'class_id' => trans('Sections_trans.name_classe'),
            'teacher_id' => trans('Sections_trans.name_teacher'),
        ];
    }
}