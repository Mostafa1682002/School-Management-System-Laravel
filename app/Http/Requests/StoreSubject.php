<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreSubject extends FormRequest
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
            'subject_name_en' => "required|regex:/^[a-zA-Z ]+/",
            'subject_name_ar' => "required|regex:/^[\p{Arabic} ]+/u",
            'school_grade_id' => "required|exists:school_grades,id",
            'classe_id' => "required|exists:classes,id",
            'teacher_id' => "required|exists:teachers,id",
        ];
    }


    public function attributes()
    {
        return [
            'subject_name_en' =>  trans('Subject_trans.name_subject_en'),
            'subject_name_ar' =>  trans('Subject_trans.name_subject_ar'),
            'school_grade_id' =>  trans('Subject_trans.grade'),
            'classe_id' => trans('Subject_trans.classroom'),
            'teacher_id' =>  trans('Subject_trans.name_teacher'),
        ];
    }
}