<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreQuestion extends FormRequest
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
            'question_title' => "required",
            'right_answer' => "required",
            'question_type' => "required|in:mcq,writing",
            'question_score' => "required|between:1,100",
            'exam_id' => "required|exists:exams,id"
        ];
    }


    public function attributes()
    {
        return [
            'question_title' => trans('Question_trans.question_title'),
            'right_answer' => trans('Question_trans.right_answer'),
            'question_type' => trans('Question_trans.question_type'),
            'question_score' => trans('Question_trans.question_score'),
            'exam_id' => trans('Question_trans.exam_name'),
        ];
    }
}