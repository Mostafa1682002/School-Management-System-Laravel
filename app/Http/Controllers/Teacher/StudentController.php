<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index(Request $request){
        $sections=auth('teacher')->user()->sections->pluck('id');
        $students=Student::whereIn('section_id',$sections)->where(function ($querey)use($request){
            if($request->has('section_id')){
                $querey->where('section_id',$request->section_id);
            }
        })->get();
        return view('Teachers.pages.students',compact('students'));
    }
}
