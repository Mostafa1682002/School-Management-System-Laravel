<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use App\Models\SchoolGrade;

class SectionController extends Controller
{
    public function index(){
        $sections=auth('teacher')->user()->sections;
        $grades=SchoolGrade::all();
        return view('Teachers.pages.sections',compact('grades','sections'));
    }
}
