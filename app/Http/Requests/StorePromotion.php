<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePromotion extends FormRequest
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
            "from_grade" => "required|exists:school_grades,id",
            "from_classe" => "required|exists:classes,id",
            "from_section" => "required|exists:sections,id",
            "from_academic_year" => "required",
            "to_grade" => "required|exists:school_grades,id",
            "to_classe" => "required|exists:classes,id",
            "to_section" => "required|exists:sections,id",
            "to_academic_year" => "required",
        ];
    }
    public function attributes(): array
    {
        return [
            "from_grade" => trans('Student_trans.old_grade'),
            "from_classe" => trans('Student_trans.old_classroom'),
            "from_section" => trans('Student_trans.old_section'),
            "from_academic_year" => trans('Student_trans.old_academic_year'),
            "to_grade" => trans('Student_trans.new_grade'),
            "to_classe" => trans('Student_trans.new_classroom'),
            "to_section" => trans('Student_trans.new_section'),
            "to_academic_year" => trans('Student_trans.new_academic_year'),
        ];
    }
}
