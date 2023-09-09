<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreBook extends FormRequest
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
            'file_name' => "required|mimes:pdf",
            'school_grade_id' => "required|exists:school_grades,id",
            'classe_id' => "required|exists:classes,id",
            'subject_id' => "required|exists:subjects,id",
            'term_id' => "required|exists:terms,id",
            'academic_year' => "required|integer"
        ];
    }

    public function  attributes()
    {
        return [
            'file_name' => trans('Books_trans.file_name'),
            'school_grade_id' => trans('Books_trans.grade'),
            'classe_id' => trans('Books_trans.classroom'),
            'subject_id' => trans('Books_trans.subject'),
            'term_id' => trans('Books_trans.term'),
            'academic_year' => trans('Books_trans.academic_year')
        ];
    }
}
