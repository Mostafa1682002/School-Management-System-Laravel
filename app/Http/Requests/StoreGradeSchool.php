<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreGradeSchool extends FormRequest
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
            'name' => ["required", "regex:/^[\p{Arabic} ]+/u", "unique:school_grades,name->ar,$this->id"],
            'name_en' => ["required", "regex:/^[a-zA-Z ]+/", "unique:school_grades,name->en,$this->id"]
        ];
    }

    public function messages()
    {
        return [
            'name.required' => trans('validation.required'),
            'name.regex' => trans('validation.regex'),
            'name.unique' => trans('validation.unique'),
            'name_en.required' => trans('validation.required'),
            'name_en.regex' => trans('validation.regex'),
            'name_en.unique' => trans('validation.unique'),
        ];
    }


    public function attributes(): array
    {
        return [
            'name' => trans('SchoolGrades_trans.stage_name_ar'),
            'name_en' => trans('SchoolGrades_trans.stage_name_en'),
        ];
    }
}
