<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use App\Models\Exam;
use App\Models\Subject;
use Illuminate\Http\Request;

class ExamController extends Controller
{
    public  function  index(){

        $sub_ids=auth('teacher')->user()->subjects->pluck('id');
        $exams=Exam::whereIn('subject_id',$sub_ids)->get();
        return view('Teachers.pages.exams',compact('exams'));
    }
}
