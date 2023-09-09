<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreStudent extends FormRequest
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
            'name_ar' => "required|regex:/^[\p{Arabic} ]+/u",
            "name_en" => ["required", "regex:/^[a-zA-Z ]+/"],
            "email" => "required|email|unique:students,email," . $this->student,
            "password" => "required|string|min:5",
            "gender_id" => "required|exists:genders,id",
            "nationalitie_id" => "required|exists:nationalities,id",
            "blood_id" => "required|exists:type__bloods,id",
            "date_birth" => "required|date",
            "grade_id" => "required|exists:school_grades,id",
            "class_id" => "required|exists:classes,id",
            "section_id" => "required|exists:sections,id",
            "parent_id" => "required|exists:myparents,id",
            "academic_year" => "required|integer",
        ];
    }


    public function attributes()
    {
        return [
            'name_ar' => trans('Student_trans.name_ar'),
            "name_en" => trans('Student_trans.name_en'),
            "email" => trans('Student_trans.email'),
            "password" => trans('Student_trans.password'),
            "gender_id" => trans('Student_trans.gender'),
            "nationalitie_id" => trans('Student_trans.nationality'),
            "blood_id" => trans('Student_trans.blood_type'),
            "date_birth" => trans('Student_trans.date_of_birth'),
            "grade_id" => trans('Student_trans.grade'),
            "class_id" => trans('Student_trans.classroom'),
            "section_id" => trans('Student_trans.section'),
            "parent_id" => trans('Student_trans.parent'),
            "academic_year" => trans('Student_trans.academic_year'),
        ];
    }
}
