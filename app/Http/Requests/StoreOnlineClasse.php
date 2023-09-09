<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreOnlineClasse extends FormRequest
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
            'topic' => "required",
            'school_grade_id' => "required|exists:school_grades,id",
            'classe_id' => "required|exists:classes,id",
            'section_id' => "required|exists:sections,id",
            'subject_id' => "required|exists:subjects,id",
            'start_time' => "required",
            'start_url' => "required|url",
            'join_url' => "required|url"
        ];
    }


    public function attributes()
    {
        return [
            'topic' => trans('OnlineClasses_trans.topic'),
            'school_grade_id' => trans('OnlineClasses_trans.grade'),
            'classe_id' => trans('OnlineClasses_trans.classroom'),
            'section_id' => trans('OnlineClasses_trans.section'),
            'subject_id' => trans('OnlineClasses_trans.subject_name'),
            'start_time' => trans('OnlineClasses_trans.start_time'),
            'start_url' => trans('OnlineClasses_trans.start_url'),
            'join_url' => trans('OnlineClasses_trans.join_link')
        ];
    }
}
