<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreFees extends FormRequest
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
            "name_en" => "required|regex:/^[a-zA-Z ]+/",
            'amount' => "required|numeric",
            'school_grade_id' => "required|exists:school_grades,id",
            'classe_id' => "required|exists:classes,id",
            'academic_year' => "required",
            "fees_type" => "required",
            'notes' => "string",
        ];
    }

    public function attributes()
    {
        return [
            "name_ar" => trans('Fees_trans.name_ar'),
            "name_en" => trans('Fees_trans.name_en'),
            "amount" => trans('Fees_trans.amount'),
            "school_grade_id" => trans('Fees_trans.grade'),
            "classe_id" => trans('Fees_trans.classroom'),
            "academic_year" => trans('Fees_trans.academic_year'),
            "fees_type" => trans('Fees_trans.fees_type'),
            "notes" => trans('Fees_trans.notes'),
        ];
    }
}
