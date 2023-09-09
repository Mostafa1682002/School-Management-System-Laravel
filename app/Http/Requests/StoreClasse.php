<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreClasse extends FormRequest
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
            'List_classes.*.class_name' => ["required", "regex:/^[\p{Arabic} ]+/u"],
            'List_classes.*.class_name_en' => ["required", "regex:/^[a-zA-Z ]+/"],
            'List_classes.*.shoolgarde_id' => ['required']
        ];
    }

    public function messages()
    {
        return [
            'class_name.required' => trans('validation.required'),
            'class_name.regex' => trans('validation.regex'),
            'class_name_en.required' => trans('validation.required'),
            'class_name_en.regex' => trans('validation.regex'),
            "shoolgarde_id.required" => trans('validation.required')
        ];
    }


    public function attributes(): array
    {
        return [
            'class_name' => trans('Classes_trans.class_name_ar'),
            'class_name_en' => trans('Classes_trans.class_name_en'),
            'shoolgarde_id' => trans('SchoolGrades_trans.Name_grade'),
        ];
    }
}
