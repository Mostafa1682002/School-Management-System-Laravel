<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use App\Models\Subject;
use Illuminate\Http\Request;

class SubjectController extends Controller
{
    public  function  index(){
        $subjects=auth('teacher')->user()->subjects;
        return view('Teachers.pages.subjects',compact('subjects'));
    }
}
