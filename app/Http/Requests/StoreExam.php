<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreExam extends FormRequest
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
            'exam_name_ar' => "required|regex:/^[\p{Arabic} ]+/u",
            'exam_name_en' => "required|regex:/^[a-zA-Z ]+/",
            'subject_id' => "required|exists:subjects,id",
            'school_grade_id' => "required|exists:school_grades,id",
            'classe_id' => "required|exists:classes,id",
            'term_id' => "required|exists:terms,id",
            'academic_year' => "required"
        ];
    }


    public function attributes()
    {
        return [
            'exam_name_ar' => trans('Exam_trans.exam_name_ar'),
            'exam_name_en' => trans('Exam_trans.exam_name_en'),
            'subject_id' => trans('Exam_trans.subject'),
            'school_grade_id' => trans('Exam_trans.grade'),
            'classe_id' => trans('Exam_trans.classroom'),
            'term_id' => trans('Exam_trans.term'),
            'academic_year' => trans('Exam_trans.academic_year'),
        ];
    }
}
