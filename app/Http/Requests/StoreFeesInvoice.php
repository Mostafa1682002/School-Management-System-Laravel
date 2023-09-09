<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreFeesInvoice extends FormRequest
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
            'student_id' => "required|exists:students,id",
            'school_grade_id' => "required|exists:school_grades,id",
            'classe_id' => "required|exists:classes,id",
            'section_id' => "required|exists:sections,id",
            'feese_id' => "required|exists:feese,id",
            'amount' => "required|numeric",
            'descrption' => "string",
        ];
    }



    public function attributes()
    {
        return [
            'student_id' => trans('Fees_trans.student_name'),
            'school_grade_id' => trans('Fees_trans.grade'),
            'classe_id' => trans('Fees_trans.classroom'),
            'section_id' => trans('Fees_trans.section'),
            'feese_id' => trans('Fees_trans.fees_type'),
            'amount' => trans('Fees_trans.amount'),
            'descrption' => trans('Fees_trans.notes')
        ];
    }
}
